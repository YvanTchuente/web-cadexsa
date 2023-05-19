@extends('layouts.auth')

@section('title', 'Sign up - CADEXSA')

@section('content')
    <form action="{{ route('signup') }}" method="post"
        class="rounded-lg border-[1px] border-gray-200 bg-white shadow-[0_0_1rem_rgb(0,0,0,10%)] sm:w-[600px]">
        <div class="space-y-1 border-b-[1px] border-b-gray-200 py-5 px-8 text-center">
            <h1 class="text-3xl">Sign up</h1>
            <p>Join our vibrant community of ex-students.</p>
        </div>
        <div class="space-y-4 px-8 pt-4 pb-8">
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
                    <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}"
                        class="form-input name pr-10" required />
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
            <div class="relative">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-input pr-10"
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
            <div class="relative">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-input pr-10"
                    required />
                <i
                    class="fa-solid fa-eye password-read-toggle absolute right-0 cursor-pointer py-3 px-4 text-sm text-gray-500"></i>
                <i
                    class="fa-solid fa-exclamation-circle failure-icon absolute py-3 px-4 text-sm text-red-500 opacity-0"></i>
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
                <i
                    class="fa-solid fa-exclamation-circle failure-icon absolute py-3 px-4 text-sm text-red-500 opacity-0"></i>
                <i class="far fa-check-circle success-icon absolute py-3 px-4 text-sm text-green-500 opacity-0"></i>
                <div class="validation-error">
                    @error('password_confirmation')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-element-container-grouping filter">
                <div class="col-span-12 sm:col-span-6">
                    <label class="form-label">Graduation year</label>
                    <div class="filtration_criterion relative col-span-12 cursor-pointer sm:col-span-9">
                        <div
                            class="select relative rounded-md border-2 border-gray-200 bg-white py-2 pl-6 pr-12 duration-300 after:absolute after:inset-y-[35%] after:right-4 after:block after:h-[10px] after:w-[10px] after:rotate-45 after:border-b-4 after:border-r-4 after:border-b-gray-500 after:border-r-gray-500 after:transition after:content-['']">
                            Batch</div>
                        <ul class="dropdown-list top-[150%] left-0 w-full overflow-hidden rounded shadow-lg">
                            <li
                                class="bg-blue-500 py-2 px-6 capitalize text-white transition duration-[0.3s] hover:bg-blue-500 hover:text-white">
                                Batch</li>
                            @foreach (range((int) date('Y'), 2019) as $year)
                                <li
                                    class="py-2 px-6 capitalize transition duration-[0.3s] hover:bg-blue-500 hover:text-white">
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
                    <div class="filtration_criterion relative col-span-12 cursor-pointer sm:col-span-9">
                        <div
                            class="select relative rounded-md border-2 border-gray-200 bg-white py-2 pl-6 pr-12 duration-300 after:absolute after:inset-y-[35%] after:right-4 after:block after:h-[10px] after:w-[10px] after:rotate-45 after:border-b-4 after:border-r-4 after:border-b-gray-500 after:border-r-gray-500 after:transition after:content-['']">
                            Field of studies</div>
                        <ul class="dropdown-list top-[150%] left-0 w-full overflow-hidden rounded shadow-lg">
                            <li class="bg-blue-500 py-2 px-6 text-white transition duration-[0.3s]">
                                Field of studies</li>
                            @foreach (\App\Enumerations\FieldOfStudy::cases() as $field)
                                <li class="py-2 px-6 transition duration-[0.3s] hover:bg-blue-500 hover:text-white">
                                    {{ $field->value }}
                                </li>
                            @endforeach
                        </ul>
                        <select class="hidden" name="field-of-study" required>
                            <option value="Field of studies" class="bg-gray-300 text-white">
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
                        class="fa-solid fa-exclamation-circle failure-icon absolute right-0 py-3 px-4 text-sm text-red-500 opacity-0"></i>
                    <i
                        class="far fa-check-circle success-icon absolute right-0 py-3 px-4 text-sm text-green-500 opacity-0"></i>
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
                        class="fa-solid fa-exclamation-circle failure-icon absolute right-0 py-3 px-4 text-sm text-red-500 opacity-0"></i>
                    <i
                        class="far fa-check-circle success-icon absolute right-0 py-3 px-4 text-sm text-green-500 opacity-0"></i>
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
                    class="fa-solid fa-exclamation-circle failure-icon absolute right-0 py-3 px-4 text-sm text-red-500 opacity-0"></i>
                <i
                    class="far fa-check-circle success-icon absolute right-0 py-3 px-4 text-sm text-green-500 opacity-0"></i>
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
