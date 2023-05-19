@extends('layouts.root')

@section('title', $event->name . ' CADEXSA')

@section('content')
    @include('partials.page-content-title', ['header' => 'Events'])
    <div class="container grid grid-cols-12 gap-y-10 py-12 md:gap-x-8 lg:gap-x-16">
        <section class="col-span-12 flex flex-col gap-y-6 md:col-span-8">
            <h1 class="text-4xl">{{ $event->name }}</h1>
            @include('partials.countdown', [
                'target_date' => $event->occurs_on->format('Y-m-d H:i:s'),
                'center' => true,
            ])
            <figure class="sm:max-h-[25rem]">
                <img src="{{ Storage::url($event->image) }}" class="h-full w-full rounded-3xl object-cover" />
            </figure>
            <div class="text-justify">
                {{ $event->description }}
            </div>
        </section>
        <aside class="col-span-12 flex flex-col gap-y-6 md:col-span-4">
            <section>
                <h3 class="mb-4">Event Info</h3>
                <ul class="space-y-4 rounded-2xl bg-blue-600 p-8 text-white">
                    <li class="flex items-center gap-x-4">
                        <i class="fa-solid fa-calendar-day"></i>
                        <span>{{ $event->occurs_on->format('l d F Y') }}</span>
                    </li>
                    <li class="flex items-center gap-x-4">
                        <i class="fa-solid fa-clock"></i>
                        <span>{{ $event->occurs_on->format('G a') }} - {{ $event->ends_on->format('G a') }}</span>
                    </li>
                    <li class="flex items-center gap-x-4">
                        <i class="fa-solid fa-map-marker-alt"></i>
                        <span>{{ $event->venue }}</span>
                    </li>
                </ul>
            </section>
            @isset($upcomingEvents)
                <section>
                    <h3 class="mb-4 text-center lg:text-left">Upcoming events</h3>
                    <ul class="flex flex-col gap-y-4">
                        @foreach ($upcomingEvents as $event)
                            <li class="flex items-center gap-x-4">
                                <img src="{{ Storage::url($event->image) }}" class="h-20 w-20 rounded-lg object-cover">
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
