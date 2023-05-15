@extends('layouts.auth')

@section('title', 'Sign up - CADEXSA')

@section('content')
    <form action="{{ route('signup') }}" method="post"
        class="sm:w-[600px] bg-white border-[1px] border-gray-200 rounded-lg shadow-[0_0_1rem_rgb(0,0,0,10%)]">
        <div class="py-5 px-8 border-b-[1px] border-b-gray-200 text-center space-y-1">
            <h1 class="text-3xl">Sign up</h1>
            <p>Join our vibrant community of ex-students.</p>
        </div>
        <div class="pt-4 pb-8 px-8 space-y-4">
            @if (session('success'))
                <div class="box success">{{ session('success') }}</div>
            @elseif (session('error'))
                <div class="box error">{{ session('error') }}</div>
            @endif
            <div class="form-element-container-grouping">
                <div class="relative col-span-12 sm:col-span-6">
                    <label for="firstname" class="form-label">First name</label>
                    <input type="text" id="firstname" name="firstname" value="{{ old('firstname') }}"
                        class="form-input name pr-10" required />
                    <i
                        class="fa-solid fa-exclamation-circle failure-icon text-red-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
                    <i
                        class="far fa-check-circle success-icon text-green-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
                    <div class="validation-error">
                        @error('firstname')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="relative col-span-12 sm:col-span-6">
                    <label for="lastname" class="form-label">Last name</label>
                    <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}"
                        class="form-input name pr-10" required />
                    <i
                        class="fa-solid fa-exclamation-circle failure-icon text-red-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
                    <i
                        class="far fa-check-circle success-icon text-green-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
                    <div class="validation-error">
                        @error('lastname')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="relative">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-input pr-10"
                    required />
                <i
                    class="fa-solid fa-exclamation-circle failure-icon text-red-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
                <i class="far fa-check-circle success-icon text-green-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
                <div class="validation-error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="relative">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-input pr-10"
                    required />
                <i
                    class="fa-solid fa-eye password-read-toggle text-gray-500 py-3 px-4 text-sm absolute right-0 cursor-pointer"></i>
                <i
                    class="fa-solid fa-exclamation-circle failure-icon text-red-500 py-3 px-4 text-sm absolute opacity-0"></i>
                <i class="far fa-check-circle success-icon text-green-500 py-3 px-4 text-sm absolute opacity-0"></i>
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
                    class="fa-solid fa-eye password-read-toggle text-gray-500 py-3 px-4 text-sm absolute right-0 cursor-pointer"></i>
                <i
                    class="fa-solid fa-exclamation-circle failure-icon text-red-500 py-3 px-4 text-sm absolute opacity-0"></i>
                <i class="far fa-check-circle success-icon text-green-500 py-3 px-4 text-sm absolute opacity-0"></i>
                <div class="validation-error">
                    @error('password_confirmation')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-element-container-grouping filter">
                <div class="col-span-12 sm:col-span-6">
                    <label class="form-label">Graduation year</label>
                    <div class="filtration_criterion col-span-12 sm:col-span-9 relative cursor-pointer">
                        <div
                            class="select relative rounded-md bg-white py-2 pl-6 pr-12 border-2 border-gray-200 after:content-[''] after:block after:absolute after:inset-y-[35%] after:right-4 after:w-[10px] after:h-[10px] after:border-b-4 after:border-b-gray-500 after:border-r-4 after:border-r-gray-500 after:rotate-45 after:transition duration-300">
                            Batch</div>
                        <ul class="dropdown w-full top-[150%] left-0 overflow-hidden shadow-lg rounded">
                            <li
                                class="transition duration-[0.3s] py-2 px-6 capitalize text-white bg-blue-500 hover:text-white hover:bg-blue-500">
                                Batch</li>
                            @foreach (range((int) date('Y'), 2019) as $year)
                                <li
                                    class="transition duration-[0.3s] py-2 px-6 capitalize hover:text-white hover:bg-blue-500">
                                    {{ $year }}
                                </li>
                            @endforeach
                        </ul>
                        <select class="hidden" name="batch" required>
                            <option value="Batch">Batch</option>
                            @foreach (range((int) date('Y'), 2019) as $year)
                                <option value="{{ $year }}">{{ $year }}></option>
                            @endforeach
                        </select>
                    </div>
                    <div class="validation-error">
                        @error('batch')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label class="form-label">Field of studies</label>
                    <div class="filtration_criterion col-span-12 sm:col-span-9 relative cursor-pointer">
                        <div
                            class="select relative rounded-md bg-white py-2 pl-6 pr-12 border-2 border-gray-200 after:content-[''] after:block after:absolute after:inset-y-[35%] after:right-4 after:w-[10px] after:h-[10px] after:border-b-4 after:border-b-gray-500 after:border-r-4 after:border-r-gray-500 after:rotate-45 after:transition duration-300">
                            Field of studies</div>
                        <ul class="dropdown w-full top-[150%] left-0 overflow-hidden shadow-lg rounded">
                            <li class="transition duration-[0.3s] py-2 px-6 text-white bg-blue-500">
                                Field of studies</li>
                            @foreach (\App\Enumerations\FieldOfStudy::cases() as $field)
                                <li class="transition duration-[0.3s] py-2 px-6 hover:text-white hover:bg-blue-500">
                                    {{ $field->value }}
                                </li>
                            @endforeach
                        </ul>
                        <select class="hidden" name="field-of-study" required>
                            <option value="Field of studies" class="text-white bg-gray-300">
                                Field of studies</option>
                            @foreach (\App\Enumerations\FieldOfStudy::cases() as $field)
                                <option value="{{ $field->value }}">
                                    {{ $field->value }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="validation-error">
                        @error('field-of-study')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-element-container-grouping">
                <div class="relative col-span-12 sm:col-span-6">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" id="country" name="country" value="{{ old('country') }}"
                        class="form-input pr-10" required />
                    <i
                        class="fa-solid fa-exclamation-circle failure-icon text-red-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
                    <i
                        class="far fa-check-circle success-icon text-green-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
                    <div class="validation-error">
                        <div class="validation-error">
                            @error('country')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="relative col-span-12 sm:col-span-6">
                    <label for="city" class="form-label">City</label>
                    <input type="text" id="city" name="city" value="{{ old('city') }}"
                        class="form-input pr-10" required />
                    <i
                        class="fa-solid fa-exclamation-circle failure-icon text-red-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
                    <i
                        class="far fa-check-circle success-icon text-green-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
                    <div class="validation-error">
                        @error('city')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="relative">
                <label for="phone" class="form-label">Phone number</label>
                <input type="tel" name="phone" value="{{ old('phone') }}" class="form-input pr-10" required />
                <i
                    class="fa-solid fa-exclamation-circle failure-icon text-red-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
                <i
                    class="far fa-check-circle success-icon text-green-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
                <div class="validation-error">
                    @error('phone')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            @csrf
            <button type="submit" class="button w-full">Register</button>
            <p class="text-center">Already have an account? <a href="{{ route('login') }}" class="text-blue-500">Sign
                    in</a></p>
        </div>
    </form>
@endsection
