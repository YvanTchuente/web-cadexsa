<article class="relative col-span-3 h-full shadow-[0_0_1.5rem_rgb(0,0,0,0.2)] lg:col-span-1">
    <div
        class="absolute -top-10 left-8 flex h-[96px] w-[96px] flex-col items-center justify-center rounded-lg bg-blue-500 text-center font-[inter-semiBold] text-2xl text-white">
        <div>{{ $event->occurs_on->format('d') }}</div>
        <div>{{ $event->occurs_on->format('M') }}</div>
    </div>
    <img src="{{ Storage::url($event->image) }}" class="h-[20rem] w-full object-cover">
    <div class="space-y-4 bg-white px-8 py-6 xl:h-[17rem]">
        @include('partials.countdown', [
            'target_date' => $event->occurs_on->format('Y-m-d H:i:s'),
        ])
        <div class="space-y-1">
            <h2 class="leading-tight">
                <a href="{{ route('event', ['event' => $event->id]) }}">
                    {{ $event->name }}
                </a>
            </h2>
            <div class="flex flex-col gap-y-1 sm:flex-row sm:gap-x-4">
                <span><i class="fa-solid fa-calendar-day mr-2"></i>{{ $event->occurs_on->format('l j F') }}</span>
                <span><i class="fa-solid fa-clock mr-2"></i>{{ $event->occurs_on->format('g a') }}</span>
            </div>
        </div>
        <a href="{{ route('event', ['event' => $event->id]) }}" class="block text-blue-500">Read
            more</a>
    </div>
</article>
