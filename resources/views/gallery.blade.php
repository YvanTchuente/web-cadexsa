@extends('layouts.root')

@section('title', 'Gallery - CADEXSA')

@section('content')
    @include('partials.page-content-title', ['header' => 'Gallery'])
    <div class="container py-12 space-y-6">
        @if ($photos->count() !== 0)
            @include('partials.filter', ['criteria' => $filtration_criteria])
            <div class="grid grid-cols-12 gap-6">
                @foreach ($photos as $photo)
                    <div class="col-span-12 sm:col-span-6 lg:col-span-4 min-h-[20rem] rounded-2xl overflow-hidden">
                        @include('partials.photo', ['photo' => $photo])
                    </div>
                @endforeach
            </div>
            {{ $photos->links() }}
        @else
            <div class="py-24 flex flex-col justify-center items-center gap-y-4">
                <img src="/images/graphics/images.png" class="h-20">
                <h2>There are no photo</h2>
            </div>
        @endif
    </div>
@endsection
