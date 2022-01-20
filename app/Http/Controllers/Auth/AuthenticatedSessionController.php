<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = $request->user();

        // if (!$user->hasVerifiedEmail()) {
        //     return redirect()->route('verification.notice');
        // }

        return redirect()->intended($user->settings['nextUrl'] ?? RouteServiceProvider::HOME);
        // return redirect()->intended(RouteServiceProvider::HOME);
    }
}
