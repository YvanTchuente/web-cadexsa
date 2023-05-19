@extends('layouts.auth')

@section('title', 'Forgot Password - CADEXSA')

@section('content')
    <form action="{{ route('password.email') }}" method="post"
        class="space-y-4 rounded-lg border-[1px] border-gray-200 bg-white py-10 px-11 shadow-[0_0_1rem_rgb(0,0,0,10%)] lg:w-[30vw]">
        <h1 class="text-center">Reset password</h1>
        @if (session('status'))
            <div class="box success">{{ session('status') }}</div>
        @elseif (session('error'))
            <div class="box error">{{ session('error') }}</div>
        @endif
        <p class="text-justify">
            Enter the email address associated with your account and we'll send you an email with
            instructions to reset your password.
        </p>
        <div class="relative">
            <input type="email" id="email" name="email" placeholder="E-mail address" class="form-input pr-10"
                required />
            <i
                class="fa-solid fa-exclamation-circle failure-icon absolute right-0 py-3 px-4 text-sm text-red-500 opacity-0"></i>
            <i class="far fa-check-circle success-icon absolute right-0 py-3 px-4 text-sm text-green-500 opacity-0"></i>
            <div class="validation-error">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
        </div>
        @csrf
        <button type="submit" class="button w-full">Send Instructions</button>
    </form>
@endsection
