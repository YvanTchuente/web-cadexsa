<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('account.login');
    }

    /**
     * Logs in a user.
     */
    public function login(Request $request)
    {
        $input = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials['password'] = $input['password'];

        if (filter_var($input['login'], FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $input['login'];
        } else {
            $credentials['username'] = $input['login'];
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended();
        }

        return back()->with('error', 'The provided credentials do not match our records.')->onlyInput('login');
    }

    /**
     * Logs out the currently authenticated user.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', "You're logged out");
    }
}
