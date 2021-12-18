<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Invite;
use App\Bag\InviteType;
use App\Models\Account;
use App\Models\MagicLink;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\AccountCreated;
use MailerLiteApi\MailerLite;
use App\Actions\Rules\Password;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Notifications\LoginViaMagicLink;
use App\Mail\Invites\ColabAcceptInviteMail;
use App\Notifications\RegisterViaMagicLink;
use Illuminate\Database\Eloquent\Relations\Relation;

class MagicLinkController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $user = $this->createNewUserAccount($request);
        }

        $user->sendLoginLink();

        return redirect(route('magic-link.check'));
    }

    protected function createNewUserAccount(Request $request)
    {
        $account = Account::create([
            'name' =>  'New Account',
            'active' => true,
        ]);

        $user = User::create([
            'name' =>  strstr($request->email, '@', true) ?? 'New User',
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : (app()->isProduction() ? Hash::make(Str::random(30)) : Hash::make('password')),
            'account_id' => $account->id
        ]);

        $user->account()->associate($account);
        // $user->updateSetting('nextUrl', route('step1.index'));
        $account->owner()->associate($user);
        // $account->trial_ends_at = now()->addDays(30);
        $account->save();

        return $user;
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users,email'],
            // 'password' => ['required', new Password],
        ]);

        $user = User::where('email', $validatedData['email'])->first();

        if (empty($user)) {
            return redirect(route('magic-link.check'));
        }

        $magicLink = MagicLink::create([
            'identifier' => $validatedData['email'],
            'token' => Str::random(20)
        ]);

        $url = route('magic-link.authenticate', [
            'token' => $magicLink->token
        ]);

        $user->notify(new LoginViaMagicLink($url));

        return redirect(route('magic-link.check'));
    }

    public function register(Request $request)
    {
        $validationRules = [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', new Password],
        ];

        app()->isProduction() ? $validationRules['g-recaptcha-response'] = 'required|recaptcha' : '';

        $request->validate($validationRules);

        if ($hasToken = $request->has('token') && !empty($request->token)) {
            $invite = Invite::whereToken(hash('sha256', $request->token))->firstOrFail();
            dd('token');
            abort_unless($invite->isValid(), 401);
            abort_unless(($invite->email === $request->email), 401);
        }
        $user = $this->createNewUserAccount($request);

        if ($hasToken) {
            $user->markEmailAsVerified();

            if ($invite->type == InviteType::PARTNER) {
                $user->account->name = $invite->setting('name', 'New Partner');
                $user->account->partner = true;
                $user->account->save();
            } else {
                $user->account->name = $invite->setting('name', 'New Account');
                $user->account->save();
            }
            $user->account->updateSetting('details.email', $request->email);

            if (!empty($invite->setting('firstName', null))) {
                $user->account->updateSetting('details.firstName', $invite->setting('firstName', $user->first_name));
            }

            if (!empty($invite->setting('partner_id', null))) {
                $user->account->partner_id = $invite->setting('partner_id', null);
                $user->account->save();
            }

            $user->updateSetting('nextUrl', $invite->setting('nextUrl', route('step1.index')));

            if (($invite->type == InviteType::COLAB) && !empty($invite->setting('payload'))) {
                $invitePayload = $invite->setting('payload');

                $inviter = Account::find($invitePayload['account_id']);

                $colab = $this->createColab($inviter, $user->account, $invitePayload);

                Mail::to($inviter->owner->email)->send(new ColabAcceptInviteMail($colab, $user->account));
            }

            $invite->consume();
            event(new AccountCreated($user));
        } else {
            event(new Registered($user));
        }

        try {
            $groupsApi = (new MailerLite(config('services.mailerlite.api')))->groups();

            $subscriber = [
                'email' => $user->email,
                'fields' => [
                    'name' => $user->getDisplayName('first'),
                    'last_name' => $user->getDisplayName('last'),
                    'company' => optional($user->account)->name,
                ]
            ];

            //FIXME: This is a temporary fix for the MailerLite API.
            // $response = $groupsApi->addSubscriber(config('services.mailerlite.groups.app_signup'), $subscriber);
        } catch (\Exception $e) {
            //exception $e;
        }

        Auth::login($user, true);

        if ($user->hasVerifiedEmail()) {
            return redirect()->intended($user->settings['nextUrl'] ?? RouteServiceProvider::HOME);
        }

        return redirect()->route('verification.notice');
    }

    private function createColab($inviter, $account, $invitePayload)
    {
        if ($invitePayload['type'] == 'retailer') {
            $payload = [
                    'retailer_id' => $account->id,
                    'supplier_id' => $inviter->id,
                ];
        } else {
            $payload = [
                    'retailer_id' => $inviter->id,
                    'supplier_id' => $account->id,
                ];
        }

        $payload['status'] = $invitePayload['status'];
        $payload['accepted_at'] = now();

        return $inviter->myColabs()->create($payload);
    }

    public function authenticate(Request $request, $token)
    {
        $token = MagicLink::whereToken(hash('sha256', $token))->firstOrFail();

        // abort_unless($request->hasValidSignature() && $token->isValid(), 401);
        abort_unless($token->isValid(), 401);

        $token->consume();

        //start trial
        $user = $token->user;

        if (!$user->account->trial_ends_at) {
            $user->account->update([
                'trial_ends_at' => now()->addMonth()
            ]);
        }

        Auth::login($user, true);

        return redirect($user->settings['nextUrl'] ?? '/');
    }

    public function oldAuthenticate($token)
    {
        if (auth()->check()) {
            return redirect(route('colabs'));
        }

        $authenticatedUser = MagicLink::validFromToken($token);

        if (!$authenticatedUser) {
            return redirect(route('magic-link.incorrect'));
        }

        Auth::login($authenticatedUser, true);

        // $ml = (new MailerLite(config('mailerlite.apiKey')))->groups();
        // $recipient = [
        //     'email' => $data['email'],
        // ];
        // $response = $ml->addSubscriber(config('mailerlite.apiKey'), $recipient);

        // $user->updateSetting('mailerLite.id', $response->id ?? '');

        $authenticatedUser->save();

        return redirect($authenticatedUser->settings['nextUrl'] ?? '/');
    }

    public function inviteAuthenticate($token, Request $request)
    {
        if (auth()->check()) {
            $redirect = $request->get('redirect', Auth::user()->settings['nextUrl'] ?? '/');
            return redirect($redirect);
        }

        $invite = Invite::whereToken(hash('sha256', $token))->firstOrFail();

        abort_unless($invite->isValid(), 401);

        $user = $this->resolveInvitedUser($invite);

        $invite->consume();

        if (!$user->account->trial_ends_at) {
            $user->account->update([
                'trial_ends_at' => now()->addMonth()
            ]);
        }

        Auth::login($user, true);

        $redirect = $request->get('redirect', $user->settings['nextUrl'] ?? '/');

        return redirect($redirect);
    }

    protected function resolveInvitedUser($invite)
    {
        if ($invite->inviteable_type === 'colab') {
            $class = Relation::getMorphedModel($invite->inviteable_type);
            $colab = $class::where('id', $invite->inviteable_id)->first();

            return optional($colab->{$invite->type})->owner;
        }
        return optional(Account::where('id', $invite->inviteable_id)->first())->owner;
    }

    public function check()
    {
        return view('magiclink.checkemail');
    }

    public function incorrect()
    {
        return view('magiclink.incorrect');
    }
}