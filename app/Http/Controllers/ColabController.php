<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColabController extends Controller
{
    public function index()
    {
        //TODO:TEMPORARY (Would be a middleware)
        if (optional(Auth::user())->account->isPartner()) {
            return redirect()->route('partner.accounts');
        }

        return view('colabs.index');
    }
}
