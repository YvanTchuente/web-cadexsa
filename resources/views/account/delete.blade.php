@extends('layouts.auth')

@section('title', 'Account Deletion - CADEXSA')

@section('content')
    <div
        class="sm:w-[400px] p-8 bg-white border-[1px] border-gray-200 space-y-86 rounded-lg shadow-[0_0_1rem_rgb(0,0,0,10%)]">
        <h1 class="text-4xl">We're sorry to see you go</h1>
        <div class="space-y-2 mt-4 mb-8">
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
