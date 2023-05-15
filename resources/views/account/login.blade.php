@extends('layouts.auth')

@section('title', 'Login - CADEXSA')

@section('content')
    <form action="{{ route('login') }}" method="post"
        class="w-fit lg:w-[450px] h-fit bg-white py-10 px-11 border-[1px] border-gray-200 rounded-lg space-y-10 shadow-[0_0_1rem_rgb(0,0,0,10%)]">
        <h1 class="text-3xl text-center">Login</h1>
        <div class="space-y-4">
            @if (session('error'))
                <div class="box error">{{ session('error') }}</div>
            @elseif (session('status'))
                <div class="box success">{{ session('status') }}</div>
            @endif
            <div class="space-y-3">
                <div class="relative">
                    <i class="fa-solid fa-user absolute py-3 px-4 text-gray-500 text-sm"></i>
                    <input type="text" id="login" name="login" class="form-input pl-10"
                        placeholder="Email or Username" value="{{ old('login') }}" required />
                </div>
                <div class="relative">
                    <i class="fa-solid fa-lock absolute py-3 px-4 text-gray-500 text-sm"></i>
                    <input type="password" id="password" name="password" class="form-input px-10" placeholder="Password"
                        required />
                    <i
                        class="fa-solid fa-eye password-read-toggle text-gray-500 py-3 px-4 text-sm absolute right-0 cursor-pointer"></i>
                </div>
                <p class="text-right"><a href="#" class="text-blue-500">Forgot Password ?</a></p>
            </div>
            <button type="submit" class="button w-full">Login</button>
        </div>
        @csrf
        <footer class="text-center">
            Not yet a member?<br /><a href="{{ route('signup') }}" class="text-blue-500">Sign up</a>
        </footer>
    </form>
@endsection
