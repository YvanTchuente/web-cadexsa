@extends('layouts.settings')

@section('page-title', 'Account Settings')

@section('page', 'General')

@section('page-content')
    <form action="{{ route('settings.general') }}" method="post" enctype="multipart/form-data" class="space-y-6 pb-4">
        @if (session('success'))
            <div class="box success">{{ session('success') }}</div>
        @endif
        <div class="relative">
            <label class="form-label font-[inter-semiBold]">Username</label>
            <input type="text" name="username" value="{{ $user->username }}" class="form-input pr-10" />
            <i
                class="hidden sm:inline fa-solid fa-exclamation-circle failure-icon text-red-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
            <i
                class="hidden sm:inline far fa-check-circle success-icon text-green-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
            <div class="validation-error">
                @error('username')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="relative">
            <label class="form-label font-[inter-semiBold]">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-input pr-10" />
            <i
                class="hidden sm:inline fa-solid fa-exclamation-circle failure-icon text-red-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
            <i
                class="hidden sm:inline far fa-check-circle success-icon text-green-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
            <div class="validation-error">
                @error('email')
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
