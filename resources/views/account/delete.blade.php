@extends('layouts.auth')

@section('title', 'Account Deletion - CADEXSA')

@section('content')
    <div
        class="space-y-86 rounded-lg border-[1px] border-gray-200 bg-white p-8 shadow-[0_0_1rem_rgb(0,0,0,10%)] sm:w-[400px]">
        <h1 class="text-4xl">We're sorry to see you go</h1>
        <div class="mt-4 mb-8 space-y-2">
            <p>If you just want to change your username, you can <a href="{{ route('settings.profile') }}"
                    class="text-blue-500">do that here</a>.
            </p>
            <p>Be advised, account deletion is final. There will be no way to restore your account.</p>
        </div>
        <form action="{{ route('destroy_account') }}" method="post" class="space-x-2">
            <a class="button" href="{{ route('settings.general') }}">Nevermind</a>
            <button type="submit" class="button">Delete my account</button>
            @csrf
        </form>
    </div>
@endsection
