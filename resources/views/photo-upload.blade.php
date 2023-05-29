@extends('layouts.auth')

@section('title', 'Upload photo - CADEXSA')

@section('head-scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/upload-photo.js'])
@endsection

@section('content')
    <div class="space-y-6 rounded-lg border-[1px] border-solid border-gray-200 bg-white p-6 sm:w-[600px]">
        <h1 class="text-center text-3xl">Upload a photo</h1>
        <div id="upload_box" class="h-[400px] rounded-lg border-4 border-dashed">
            <div id="placeholder" class="flex h-full items-center justify-center">
                <div class="text-center">
                    Drag and drop an image here, or <span class="cursor-pointer text-blue-500" id="select-photo">browse</span>
                    your computer.
                </div>
            </div>
        </div>
        <div class="hidden">
            <div class="flex items-center justify-center gap-x-2">
                <button class="button" id="show-details-form-button">Continue</button>
                <button class="button" id="remove-photo-button">Remove</button>
            </div>
        </div>
    </div>
    <div class="fixed left-0 top-0 z-[1001] hidden h-full w-full bg-[rgba(0,0,0,0.5)]">
        <div class="flex h-full w-full items-center justify-center">
            <form enctype="multipart/form-data" action="{{ route('photo.upload') }}" method="post" id="photo-upload-form"
                class="rounded-lg bg-white py-6 px-8 sm:w-[500px]">
                <h1 class="mb-4">Details of the photo</h1>
                <input type="file" name="photo" id="photo-input" accept="image/jpeg" class="hidden">
                <div class="mb-4">
                    <label for="creation-date" class="form-label">Date of creation</label>
                    <input type="date" name="creation-date" id="photo-creation-date"
                        placeholder="Date at which the picture was shot" class="form-input">
                </div>
                <div class="mb-4">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="photo-description" class="form-input"
                        placeholder="Describe the circumstances in which the photo was shot" rows="5"></textarea>
                </div>
                @csrf
                <input type="submit" class="button mr-2" value="Upload">
                <button type="reset" class="button" id="cancel-photo-upload">Cancel</button>
            </form>
        </div>
    </div>
@endsection
