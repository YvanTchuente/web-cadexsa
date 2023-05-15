<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class SignupController extends Controller
{
    /**
     * Show the sign-up form.
     */
    public function showSignupForm()
    {
        return view('account.signup');
    }

    /**
     * Sign up a user.
     */
    public function signup(SignupRequest $request)
    {
        try {
            $user = new User([
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'batch' => $request->input('batch'),
                'field_of_study' => $request->input('field-of-study'),
                'country' => $request->input('country'),
                'city' => $request->input('city'),
                'phone' => $request->input('phone'),
                'avatar' => '/images/graphics/default-profile-picture.png'
            ]);
            $user->saveOrFail();
        } catch (\Throwable $th) {
            return back()->with(
                'error',
                "Your sign-up failed. Please make sure we've got your details right."
            );
        }

        event(new Registered($user));

        return back()->with(
            'success',
            'A link to verify your email address has been emailed to the address provided.'
        );
    }
}
