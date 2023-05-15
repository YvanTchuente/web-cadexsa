@extends('layouts.settings')

@section('page-title', 'Account Password')

@section('page', 'Password')

@section('page-content')
    <form action="{{ route('settings.password') }}" method="post" class="space-y-6 pb-4">
        @if (session('message'))
            <div class="box success">{{ session('message') }}</div>
        @endif
        <div class="relative">
            <label for="password" class="form-label font-[inter-semiBold]">Current Password</label>
            <input type="password" id="current_password" name="current_password" value="{{ old('current_password') }}"
                class="form-input pr-10" required />
            <i
                class="fa-solid fa-eye password-read-toggle text-gray-500 py-3 px-4 text-sm absolute right-0 cursor-pointer"></i>
            <i
                class="hidden sm:inline fa-solid fa-exclamation-circle failure-icon text-red-500 py-3 px-4 text-sm absolute opacity-0"></i>
            <i
                class="hidden sm:inline far fa-check-circle success-icon text-green-500 py-3 px-4 text-sm absolute opacity-0"></i>
            <div class="validation-error">
                @error('current_password')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="relative">
            <label for="password" class="form-label font-[inter-semiBold]">New Password</label>
            <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-input pr-10"
                required />
            <i
                class="fa-solid fa-eye password-read-toggle text-gray-500 py-3 px-4 text-sm absolute right-0 cursor-pointer"></i>
            <i
                class="hidden sm:inline fa-solid fa-exclamation-circle failure-icon text-red-500 py-3 px-4 text-sm absolute opacity-0"></i>
            <i
                class="hidden sm:inline far fa-check-circle success-icon text-green-500 py-3 px-4 text-sm absolute opacity-0"></i>
            <div class="validation-error">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="relative">
            <label for="password_confirmation" class="form-label font-[inter-semiBold]">Confirm password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                value="{{ old('password_confirmation') }}" class="form-input pr-10" required />
            <i
                class="fa-solid fa-eye password-read-toggle text-gray-500 py-3 px-4 text-sm absolute right-0 cursor-pointer"></i>
            <i
                class="hidden sm:inline fa-solid fa-exclamation-circle failure-icon text-red-500 py-3 px-4 text-sm absolute opacity-0"></i>
            <i
                class="hidden sm:inline far fa-check-circle success-icon text-green-500 py-3 px-4 text-sm absolute opacity-0"></i>
            <div class="validation-error">
                @error('password_confirmation')
                    {{ $message }}
                @enderror
            </div>
        </div>
        @csrf
        <div class="flex justify-end">
            <button type="submit" class="button">Save Changes</button>
        </div>
    </form>
@endsection
