@extends('layouts.root')

@section('title', 'Contact Us - CADEXSA')

@section('content')
    @include('partials.page-content-title', ['header' => 'Contact Us'])
    <div class="container space-y-4 py-12">
        @if (session('success'))
            <div class="box success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="box error">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('contact-us') }}" method="POST" class="space-y-4">
            <div class="form-element-container-grouping">
                <div class="relative col-span-12 sm:col-span-6">
                    <label for="firstname" class="form-label">First name</label>
                    <input type="text" class="form-input name pr-10" id="firstname" name="firstname" required />
                    <i
                        class="fa-solid fa-exclamation-circle failure-icon absolute right-0 py-3 px-4 text-sm text-red-500 opacity-0"></i>
                    <i
                        class="far fa-check-circle success-icon absolute right-0 py-3 px-4 text-sm text-green-500 opacity-0"></i>
                    <div class="validation-error">
                        @error('firstname')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="relative col-span-12 sm:col-span-6">
                    <label for="lastname" class="form-label">Last name</label>
                    <input type="text" class="form-input name pr-10" id="lastname" name="lastname" required />
                    <i
                        class="fa-solid fa-exclamation-circle failure-icon absolute right-0 py-3 px-4 text-sm text-red-500 opacity-0"></i>
                    <i
                        class="far fa-check-circle success-icon absolute right-0 py-3 px-4 text-sm text-green-500 opacity-0"></i>
                    <div class="validation-error">
                        @error('lastname')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-element-container-grouping">
                <div class="relative col-span-12 sm:col-span-6">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-input pr-10" id="email" name="email" required />
                    <i
                        class="fa-solid fa-exclamation-circle failure-icon absolute right-0 py-3 px-4 text-sm text-red-500 opacity-0"></i>
                    <i
                        class="far fa-check-circle success-icon absolute right-0 py-3 px-4 text-sm text-green-500 opacity-0"></i>
                    <div class="validation-error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="relative col-span-12 sm:col-span-6">
                    <label for="phone" class="form-label">Phone number</label>
                    <input class="form-input pr-10" id="phone" name="phone" />
                    <i
                        class="fa-solid fa-exclamation-circle failure-icon absolute right-0 py-3 px-4 text-sm text-red-500 opacity-0"></i>
                    <i
                        class="far fa-check-circle success-icon absolute right-0 py-3 px-4 text-sm text-green-500 opacity-0"></i>
                    <div class="validation-error">
                        @error('phone')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div>
                <label for="message" class="form-label">Message</label>
                <textarea id="message" name="message" class="form-input h-64" placeholder="We're interested in what you have to say"></textarea>
                <div class="validation-error">
                    @error('message')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            @csrf
            <button type="submit" class="button mt-5 w-full">Send Message</button>
        </form>
    </div>
@endsection
