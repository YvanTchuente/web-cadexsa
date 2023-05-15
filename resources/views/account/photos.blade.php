@extends('layouts.account')

@section('page')
    @if ($user->photos->count() !== 0)
        <div class="flex flex-col justify-center items-center gap-y-4">
            <div class="grid grid-cols-12 gap-6">
                @foreach ($user->photos as $photo)
                    <div class="col-span-12 sm:col-span-6 lg:col-span-4 min-h-[20rem] rounded-2xl overflow-hidden">
                        @include('partials.photo', ['photo' => $photo])
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="py-12 flex flex-col justify-center items-center">
            <img src="/images/graphics/images.png" class="h-20">
            <h2>There are no photo</h2>
        </div>
    @endif
@endsection
