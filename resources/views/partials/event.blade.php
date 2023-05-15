<article class="relative col-span-3 lg:col-span-1 h-full shadow-[0_0_1.5rem_rgb(0,0,0,0.2)]">
    <div
        class="w-[96px] h-[96px] absolute -top-10 left-8 flex flex-col items-center justify-center bg-blue-500 font-[inter-semiBold] text-white text-2xl text-center rounded-lg">
        <div>{{ $event->occurs_on->format('d') }}</div>
        <div>{{ $event->occurs_on->format('M') }}</div>
    </div>
    <img src="{{ Storage::url($event->image) }}" class="w-full h-[20rem] object-cover">
    <div class="px-8 py-6 space-y-4 bg-white xl:h-[17rem]">
        @include('partials.countdown', [
            'target_date' => $event->occurs_on->format('Y-m-d H:i:s'),
        ])
        <div class="space-y-1">
            <h2 class="leading-tight">
                <a href="{{ route('event', ['event' => $event->id]) }}">
                    {{ $event->name }}
                </a>
            </h2>
            <div class="flex flex-col sm:flex-row gap-y-1 sm:gap-x-4">
                <span><i class="fa-solid fa-calendar-day mr-2"></i>{{ $event->occurs_on->format('l j F') }}</span>
                <span><i class="fa-solid fa-clock mr-2"></i>{{ $event->occurs_on->format('g a') }}</span>
            </div>
        </div>
        <a href="{{ route('event', ['event' => $event->id]) }}" class="block text-blue-500">Read
            more</a>
    </div>
</article>
