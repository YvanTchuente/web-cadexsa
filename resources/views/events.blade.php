@extends('layouts.root')

@section('title', 'Events - CADEXSA')

@section('content')
    @include('partials.page-content-title', ['header' => 'Events'])
    <div class="container space-y-6 py-12">
        @if ($events->count() !== 0)
            @include('partials.filter', ['criteria' => $filtration_criteria])
            @include('partials.event-list', ['events' => $events])
            {{ $events->links() }}
        @else
            <div class="flex flex-col items-center justify-center gap-y-4 py-24">
                <img src="/images/graphics/calendar.png" class="h-20">
                <h2>There are no events</h2>
            </div>
        @endif
    </div>
@endsection
