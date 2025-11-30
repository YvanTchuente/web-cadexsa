<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Enumerations\FieldOfStudy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class AccountController extends Controller
{
    public function showProfile($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('account.profile', ['user' => $user]);
    }

    public function showArticles($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('account.articles', ['user' => $user]);
    }

    public function showProfileSettings()
    {
        return view('account.settings.profile', ['user' => auth()->user()]);
    }

    public function editProfile(Request $request)
    {
        $input = $request->validate([
            'firstname' => 'required|string|min:3',
            'lastname' => 'required|string|min:3',
            'batch' => 'required|numeric|min:2019',
            'field-of-study' => ['required', Rule::enum(FieldOfStudy::class)],
            'country' => 'required|string',
            'city' => 'required|string',
            'avatar' => ['sometimes', 'required', File::types(['jpeg', 'jpg'])],
            'phone' => [
                'required',
                'regex:/((?:\+|00)[17](?: |\-)?|(?:\+|00)[1-9]\d{0,2}(?: |\-)?|(?:\+|00)1\-\d{3}(?: |\-)?)?(0\d|\([0-9]{3}\)|[1-9]{0,3})(?:((?: |\-)[0-9]{2}){4}|((?:[0-9]{2}){4})|((?: |\-)[0-9]{3}(?: |\-)[0-9]{4})|([0-9]{7}))/'
            ],
        ]);

        $user = $request->user();

        // Handle profile picture
        if ($avatar = $input['avatar']) {
            $avatarName = $user->id . '.' . $avatar->extension();
            $avatarFilename = storage_path('app/public/avatars/' . $avatarName);

            Storage::delete('/public/avatars/' . $avatarName);
            $avatar->storeAs('public/avatars', $avatarName);

            // Compress the avatar
            $image = imagecreatefromjpeg($avatarFilename);
            imagejpeg($image, $avatarFilename, 60);

            $user->avatar = '/storage/avatars/' . $avatarName;
        } elseif ($request->input('removeAvatar')) {
            Storage::delete('/public/avatars/' . $user->id . '.jpg');
            $user->avatar = '/images/graphics/default-profile-picture.png';
        }

        $user->firstname = $input['firstname'];
        $user->lastname = $input['lastname'];
        $user->country = $input['country'];
        $user->city = $input['city'];
        $user->phone = $input['phone'];
        $user->batch = $input['batch'];
        $user->field_of_study = $input['field-of-study'];

        $user->saveOrFail();

        return redirect()->route('settings.profile')->with('success', 'Profile updated successfully');
    }

    public function showAccountSettings()
    {
        return view('account.settings.general', ['user' => auth()->user()]);
    }

    public function editAccount(Request $request)
    {
        $input = $request->validate([
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($request->user()->id)
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($request->user()->id)
            ]
        ]);

        $user = $request->user();
        $user->username = $input['username'];
        $user->email = $input['email'];

        $user->saveOrFail();

        return redirect()->route('settings.general')->with('success', 'Your account has been updated');
    }

    public function showPasswordEditForm()
    {
        return view('account.settings.password', ['user' => auth()->user()]);
    }

    public function editPassword(Request $request)
    {
        $input = $request->validate([
            'current_password' => 'required|current_password',
            'password' => ['required', 'confirmed', Password::min(8)]
        ]);

        $user = $request->user();
        $user->password = Hash::make($input['password']);
        $user->saveOrFail();

        return redirect()->route('settings.password')->with(
            'success',
            "Your password has been reset successfully"
        );
    }

    public function confirmAccountDeletion()
    {
        return view('account.delete');
    }

    public function deleteAccount()
    {
        $user = request()->user();
        $user->delete();
        Auth::logout();

        return redirect()->route('login');
    }
}
