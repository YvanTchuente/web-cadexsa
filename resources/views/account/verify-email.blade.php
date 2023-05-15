@extends('layouts.auth')

@section('title', 'Verify your email - CADEXSA')

@section('content')
    <div class="py-[4rem] flex justify-center">
        <div class="w-[35rem] flex flex-col items-center justify-center gap-y-2">
            @if (session('message'))
                <div class="box success w-full mb-6">{{ session('message') }}</div>
            @endif
            <img src="/images/graphics/notification.png" class="w-20 h-20">
            <h1 class="mb-2">Verify your email</h1>
            <p class="text-center">We've sent an email to <span
                    class="font-[inter-semiBold]">{{ auth()->user()->email }}</span> to verify your email
                address and activate
                your account.</p>
            <p class="text-center"><a href="{{ route('verification.resend') }}" class="text-blue-500">Click here</a> if you
                did not
                receive an email or
                would like to
                change the email address you signed up with</p>
        </div>
    </div>
@endsection
