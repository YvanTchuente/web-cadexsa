@extends('layouts.root')

@section('title', $photo->description . ' - CADEXSA')

@section('content')
    <div class="container my-12 space-y-8">
        <div class="flex h-[400px] justify-center"><img src="{{ $photo->url() }}" class="h-full w-fit"></div>
        <div class="space-y-5">
            <div class="flex gap-x-8 text-gray-500">
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
                <div class="flex h-fit items-center gap-x-2">
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
            @can('update-photo', $photo)
                <div class="flex items-center justify-center gap-x-2">
                    <button class="button" id="edit-button">Edit</button>
                </div>
            @endcan
        </div>
    </div>
    @can('update-photo', $photo)
        <div class="fixed left-0 top-0 z-[1001] h-full w-full bg-[rgba(0,0,0,0.5)]" style="display: none">
            <div class="flex h-full w-full items-center justify-center">
                <form action="{{ url()->current() }}" method="post" id="photo-update-form"
                    class="rounded-lg bg-white py-6 px-8 sm:w-[500px]">
                    <h1 class="mb-4">Details of the photo</h1>
                    <div class="mb-4">
                        <label for="creation-date" class="form-label">Date of creation</label>
                        <input type="date" name="creation-date" id="photo-creation-date"
                            placeholder="Date at which the picture was shot" value="{{ $photo->shot_on->format('Y-m-d') }}"
                            class="form-input">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="photo-description" class="form-input"
                            placeholder="Describe the circumstances in which the photo was shot" rows="5">{{ $photo->description }}</textarea>
                    </div>
                    @csrf
                    <input type="submit" class="button mr-2" value="Update">
                    <button type="reset" class="button" id="cancel">Cancel</button>
                </form>
            </div>
        </div>
    @endcan
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $("#photo-update-form").parent().parent().hide();

        $("#edit-button").click(function() {
            $("#photo-update-form").parent().parent().show();
        });

        $("#cancel").click(function() {
            $("#photo-update-form").parent().parent().hide();
        });
    </script>
@endsection
