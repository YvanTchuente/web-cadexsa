@extends('layouts.account')

@section('page')
    <div class="grid grid-cols-12 gap-y-6 lg:mx-auto lg:w-[900px]">
        <div class="col-span-12 grid grid-cols-12 gap-y-8 sm:gap-x-6 lg:col-span-8 lg:gap-y-8 lg:gap-x-8">
            <div class="col-span-12 space-y-2 sm:col-span-6">
                <div class="font-[inter-semiBold]">First name</div>
                <div>{{ $user->firstname }}</div>
            </div>
            <div class="col-span-12 space-y-2 sm:col-span-6">
                <div class="font-[inter-semiBold]">Last name</div>
                <div>{{ $user->lastname }}</div>
            </div>
            <div class="col-span-12 space-y-2 sm:col-span-6">
                <div class="font-[inter-semiBold]">Email</div>
                <div>{{ $user->email }}</div>
            </div>
            <div class="col-span-12 space-y-2 sm:col-span-6">
                <div class="font-[inter-semiBold]">Phone number</div>
                <div>{{ $user->phone }}</div>
            </div>
            <div class="col-span-12 space-y-2 sm:col-span-6">
                <div class="font-[inter-semiBold]">Field of studies</div>
                <div>{{ $user->field_of_study->value }}</div>
            </div>
            <div class="col-span-12 space-y-2 sm:col-span-6">
                <div class="font-[inter-semiBold]">Batch</div>
                <div>{{ $user->batch }}</div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-4">
            <div class="space-y-4 rounded-lg bg-gray-100 p-8">
                <div><i class="fa-solid fa-location-dot pr-2"></i><span>{{ $user->city }}, {{ $user->country }}</span>
                </div>
                <div><i class="fa-solid fa-user-check pr-2"></i><span>Member since
                        {{ (new \DateTime($user->created_at))->format('M Y') }}</span></div>
            </div>
        </div>
    </div>
@endsection
