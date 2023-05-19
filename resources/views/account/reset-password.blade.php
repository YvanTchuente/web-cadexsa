@extends('layouts.auth')

@section('title', 'Password reset - CADEXSA')

@section('content')
    <form action="{{ route('password.update') }}" method="post"
        class="space-y-4 rounded-lg border-[1px] border-gray-200 bg-white py-10 px-11 shadow-[0_0_1rem_rgb(0,0,0,10%)] lg:w-[30vw]">
        <h1 class="text-center">Create new password</h1>
        @if (session('status'))
            <div class="box success">{{ session('status') }}</div>
        @elseif ($errors->has('token'))
            <div class="box error">{{ $errors->first('token') }}</div>
        @endif
        <p class="text-center">Your new password must be different from previous used passwords</p>
        <div class="relative">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-input pr-10"
                required />
            <i
                class="fa-solid fa-eye password-read-toggle absolute right-0 cursor-pointer py-3 px-4 text-sm text-gray-500"></i>
            <i class="fa-solid fa-exclamation-circle failure-icon absolute py-3 px-4 text-sm text-red-500 opacity-0"></i>
            <i class="far fa-check-circle success-icon absolute py-3 px-4 text-sm text-green-500 opacity-0"></i>
            <div class="validation-error">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="relative">
            <label for="password_confirmation" class="form-label">Confirm password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                value="{{ old('password_confirmation') }}" class="form-input pr-10" required />
            <i
                class="fa-solid fa-eye password-read-toggle absolute right-0 cursor-pointer py-3 px-4 text-sm text-gray-500"></i>
            <i class="fa-solid fa-exclamation-circle failure-icon absolute py-3 px-4 text-sm text-red-500 opacity-0"></i>
            <i class="far fa-check-circle success-icon absolute py-3 px-4 text-sm text-green-500 opacity-0"></i>
            <div class="validation-error">
                @error('password_confirmation')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <input type="hidden" name="email" value="{{ request()->input('email') }}">
        <input type="hidden" name="token" value="{{ $token }}">
        @csrf
        <button type="submit" class="button w-full">Reset Password</button>
    </form>
@endsection
