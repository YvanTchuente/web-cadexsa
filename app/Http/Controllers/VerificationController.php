<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerificationController extends Controller
{
    public function show()
    {
        return view('account.verify-email');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('home');
    }

    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
