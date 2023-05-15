@extends('layouts.root')

@section('title', $event->name . ' CADEXSA')

@section('content')
    @include('partials.page-content-title', ['header' => 'Events'])
    <div class="container py-12 grid grid-cols-12 md:gap-x-8 lg:gap-x-16 gap-y-10">
        <section class="col-span-12 md:col-span-8 flex flex-col gap-y-6">
            <h1 class="text-4xl">{{ $event->name }}</h1>
            @include('partials.countdown', [
                'target_date' => $event->occurs_on->format('Y-m-d H:i:s'),
                'center' => true,
            ])
            <figure class="sm:max-h-[25rem]">
                <img src="{{ Storage::url($event->image) }}" class="w-full h-full object-cover rounded-3xl" />
            </figure>
            <div class="text-justify">
                {{ $event->description }}
            </div>
        </section>
        <aside class="col-span-12 md:col-span-4 flex flex-col gap-y-6">
            <section>
                <h3 class="mb-4">Event Info</h3>
                <ul class="p-8 bg-blue-600 text-white rounded-2xl space-y-4">
                    <li class="flex gap-x-4 items-center">
                        <i class="fa-solid fa-calendar-day"></i>
                        <span>{{ $event->occurs_on->format('l d F Y') }}</span>
                    </li>
                    <li class="flex gap-x-4 items-center">
                        <i class="fa-solid fa-clock"></i>
                        <span>{{ $event->occurs_on->format('G a') }} - {{ $event->ends_on->format('G a') }}</span>
                    </li>
                    <li class="flex gap-x-4 items-center">
                        <i class="fa-solid fa-map-marker-alt"></i>
                        <span>{{ $event->venue }}</span>
                    </li>
                </ul>
            </section>
            @isset($upcomingEvents)
                <section>
                    <h3 class="text-center lg:text-left mb-4">Upcoming events</h3>
                    <ul class="flex flex-col gap-y-4">
                        @foreach ($upcomingEvents as $event)
                            <li class="flex items-center gap-x-4">
                                <img src="{{ Storage::url($event->image) }}" class="w-20 h-20 object-cover rounded-lg">
                                <div class="flex flex-col gap-y-1">
                                    <a href="{{ route('event', ['event' => $event->id]) }}" class="font-[inter-bold]">
                                        {{ $event->name }}
                                    </a>
                                    <span>{{ $event->occurs_on->format('d F Y') }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </section>
            @endisset
        </aside>
    </div>
@endsection
