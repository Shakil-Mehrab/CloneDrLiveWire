<?php

namespace App\Http\Controllers\Auth;

use App\Events\AccountCreated;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            dd('has');
            return redirect()->intended($request->user()->settings['nextUrl'] ?? RouteServiceProvider::HOME . '?verified=1');
            // return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new AccountCreated($request->user()));
            event(new Verified($request->user()));
        }
        dd('out');
        return redirect()->intended($request->user()->settings['nextUrl'] ?? RouteServiceProvider::HOME . '?verified=1');
        // return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');
    }
}