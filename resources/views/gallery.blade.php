@extends('layouts.root')

@section('title', 'Gallery - CADEXSA')

@section('content')
    @include('partials.page-content-title', ['header' => 'Gallery'])
    <div class="container space-y-6 py-12">
        @if ($photos->count() !== 0)
            @include('partials.filter', ['criteria' => $filtration_criteria])
            <div class="grid grid-cols-12 gap-6">
                @foreach ($photos as $photo)
                    <div class="col-span-12 min-h-[20rem] overflow-hidden rounded-2xl sm:col-span-6 lg:col-span-4">
                        @include('partials.photo', ['photo' => $photo])
                    </div>
                @endforeach
            </div>
            {{ $photos->links() }}
        @else
            <div class="flex flex-col items-center justify-center gap-y-4 py-24">
                <img src="/images/graphics/images.png" class="h-20">
                <h2>There are no photo</h2>
            </div>
        @endif
    </div>
@endsection
