@extends('layouts.root')

@section('title', $photo->description . ' - CADEXSA')

@section('content')
    <div class="container my-12 space-y-8">
        <div class="h-[400px] flex justify-center"><img src="{{ $photo->url() }}" class="h-full w-fit"></div>
        <div class="space-y-5">
            <div class="text-gray-500 flex gap-x-8">
                <div class="space-y-1">
                    <div class="flex items-center gap-x-2">
                        <i class="fa-solid fa-calendar-day"></i>
                        <span>Published on {{ $photo->created_at->format('F j, Y') }}</span>
                    </div>
                    <div class="flex items-center gap-x-2">
                        <i class="fa-solid fa-calendar-day"></i>
                        <span>Shot on {{ $photo->shot_on->format('F j, Y') }}</span>
                    </div>
                </div>
                <div class="h-fit flex items-center gap-x-2">
                    <i class="fa-solid fa-user"></i>
                    <span>
                        By
                        <a href="{{ route('member.profile', ['username' => $photo->author->username]) }}">
                            {{ $photo->author->fullname() }}
                        </a>
                    </span>
                </div>
            </div>
            <p>{{ $photo->description }}</p>
        </div>
    </div>
@endsection
