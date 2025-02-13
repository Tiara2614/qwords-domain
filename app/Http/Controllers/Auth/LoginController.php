<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        Auth::attempt($request->only('email', 'password'));

        if (Auth::check()) {
            return view('checkout', ['domain' => $request->session()->get('domain')]);
        }

        return back()->with('error', 'Invalid login credentials');
    }
}
