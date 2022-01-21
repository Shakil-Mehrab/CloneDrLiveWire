<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnectorController extends Controller
{
    public function index()
    {
        //TODO:TEMPORARY (Would be a middleware)
        if (optional(Auth::user())->account->isPartner()) {
            return redirect()->route('partner.accounts');
        }

        $connectors = Auth::user()->account->connectors;
        return view('connectors.index', compact('connectors'));
    }
}