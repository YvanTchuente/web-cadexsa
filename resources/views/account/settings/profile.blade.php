@extends('layouts.settings')

@section('head-scripts')
    @vite(['resources/js/edit-profile.js'])
@endsection

@section('page-title', 'Profile Settings')

@section('page', 'Profile')

@section('page-content')
    <form action="{{ route('settings.profile') }}" method="post" enctype="multipart/form-data"
        class="flex flex-col gap-y-6 pb-4">
        @if (session('success'))
            <div class="box success">{{ session('success') }}</div>
        @endif
        <div class="flex items-center gap-x-4">
            <img src="{{ $user->avatar }}" class="w-20 h-20 rounded-full" id="avatar" />
            <div class="flex flex-col sm:flex-row gap-x-4 gap-y-2 sm:gap-y-0">
                <button type="button" class="button" id="upload-avatar">Upload picture</button>
                <button type="button" class="button bg-gray-200 text-black hover:bg-gray-300"
                    id="reset-avatar">Delete</button>
                <input type="file" name="avatar" accept=".jpg" class="hidden" />
                <input type="checkbox" name="removeAvatar" class="hidden" id="removeAvatar">
            </div>
        </div>
        <div class="relative">
            <label class="form-label font-[inter-semiBold]">First name</label>
            <input type="text" name="firstname" value="{{ $user->firstname }}" class="form-input name pr-10" />
            <i
                class="fa-solid fa-exclamation-circle failure-icon text-red-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
            <i class="far fa-check-circle success-icon text-green-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
            <div class="validation-error">
                @error('firstname')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="relative">
            <label class="form-label font-[inter-semiBold]">Last name</label>
            <input type="text" name="lastname" value="{{ $user->lastname }}" class="form-input name pr-10" />
            <i
                class="fa-solid fa-exclamation-circle failure-icon text-red-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
            <i class="far fa-check-circle success-icon text-green-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
            <div class="validation-error">
                @error('lastname')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="relative">
            <label class="form-label font-[inter-semiBold]">Phone number</label>
            <input type="tel" name="phone" value="{{ $user->phone }}" class="form-input pr-10" />
            <i
                class="fa-solid fa-exclamation-circle failure-icon text-red-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
            <i class="far fa-check-circle success-icon text-green-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
            <div class="validation-error">
                @error('phone')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <h3 class="pb-2 border-b-[1px] border-b-gray-300">Location</h3>
        <div class="grid grid-cols-12 gap-y-6 sm:gap-x-6">
            <div class="col-span-12 sm:col-span-6 relative">
                <label class="form-label font-[inter-semiBold]">Country</label>
                <input type="text" name="country" value="{{ $user->country }}" class="form-input pr-10" />
                <i
                    class="fa-solid fa-exclamation-circle failure-icon text-red-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
                <i class="far fa-check-circle success-icon text-green-500 py-3 px-4 text-sm absolute right-0 opacity-0"></i>
                <div class="validation-error">
                    @error('country')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <label class="form-label font-[inter-semiBold]">City</label>
                <input type="text" name="city" value="{{ $user->city }}" class="form-input" />
            </div>
        </div>
        <h3 class="pb-2 border-b-[1px] border-b-gray-300">Student profile</h3>
        <div class="grid grid-cols-12 gap-y-6 sm:gap-x-6">
            <div class="col-span-12 sm:col-span-6 filter">
                <label class="form-label font-[inter-semiBold]">Batch</label>
                <div class="filtration_criterion col-span-12 sm:col-span-9 relative cursor-pointer">
                    <div
                        class="select relative rounded-md bg-white py-2 pl-6 pr-12 border-2 border-gray-300 after:content-[''] after:block after:absolute after:inset-y-[35%] after:right-4 after:w-[10px] after:h-[10px] after:border-b-4 after:border-b-gray-500 after:border-r-4 after:border-r-gray-500 after:rotate-45 after:transition duration-300">
                        {{ $user->batch }}</div>
                    <ul class="dropdown-list w-full top-[150%] left-0 overflow-hidden shadow-lg rounded">
                        <li class="transition duration-[0.3s] py-2 px-6 capitalize hover:text-white hover:bg-blue-500">
                            Batch</li>
                        @foreach (range((int) date('Y'), 2016) as $year)
                            <li
                                class="transition duration-[0.3s] py-2 px-6 capitalize @if ($year == $user->batch) text-white bg-blue-500 @endif hover:text-white hover:bg-blue-500">
                                {{ $year }}
                            </li>
                        @endforeach
                    </ul>
                    <select class="hidden" name="batch" required>
                        <option value="Batch">Batch</option>
                        @foreach (range((int) date('Y'), 2016) as $year)
                            <option value="{{ $year }}" @selected($year == $user->batch)>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 filter">
                <label class="form-label font-[inter-semiBold]">Field of studies</label>
                <div class="filtration_criterion col-span-12 sm:col-span-9 relative cursor-pointer">
                    <div
                        class="select relative rounded-md bg-white py-2 pl-6 pr-12 border-2 border-gray-300 after:content-[''] after:block after:absolute after:inset-y-[35%] after:right-4 after:w-[10px] after:h-[10px] after:border-b-4 after:border-b-gray-500 after:border-r-4 after:border-r-gray-500 after:rotate-45 after:transition duration-300">
                        {{ $user->field_of_study->value }}</div>
                    <ul class="dropdown-list w-full top-[150%] left-0 overflow-hidden shadow-lg rounded">
                        <li class="py-2 px-6 capitalize transition">
                            Field of studies</li>
                        @foreach (\App\Enumerations\FieldOfStudy::cases() as $field)
                            <li
                                class="py-2 px-6 capitalize @if ($field->value == $user->field_of_study->value) text-white bg-blue-500 @endif hover:text-white hover:bg-blue-500 transition">
                                {{ $field->value }}
                            </li>
                        @endforeach
                    </ul>
                    <select class="hidden" name="field-of-study" required>
                        <option value="Field of studies" class="text-white bg-gray-300 capitalize">
                            Field of studies</option>
                        @foreach (\App\Enumerations\FieldOfStudy::cases() as $field)
                            <option value="{{ $field->value }}" @if ($field->value == $user->field_of_study->value) selected @endif>
                                {{ $field->value }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        @csrf
        <div class="flex justify-end">
            <button type="submit" class="button">Save Changes</button>
        </div>
    </form>
@endsection
