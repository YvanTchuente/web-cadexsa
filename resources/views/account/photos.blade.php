@extends('layouts.account')

@section('page')
    @if ($user->photos->count() !== 0)
        <div class="flex flex-col items-center justify-center gap-y-4">
            <div class="grid grid-cols-12 gap-6">
                @foreach ($user->photos as $photo)
                    <div class="col-span-12 min-h-[20rem] overflow-hidden rounded-2xl sm:col-span-6 lg:col-span-4">
                        @include('partials.photo', ['photo' => $photo])
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="flex flex-col items-center justify-center py-12">
            <img src="/images/graphics/images.png" class="h-20">
            <h2>There are no photo</h2>
        </div>
    @endif
@endsection
