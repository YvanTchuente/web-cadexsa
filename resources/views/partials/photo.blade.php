<article class="photo relative h-full w-full overflow-hidden">
    <img src="{{ $photo->url() }}" class="h-full w-full object-cover transition" />
    <div class="absolute top-0 left-0 h-full w-full bg-black p-6 text-white opacity-0 transition">
        <div class="flex h-full w-full flex-col">
            <div class="flex-[0_1_auto]">
                <i class="fa-solid fa-calendar-day mr-3"></i>
                {{ $photo->shot_on->format('F j, Y') }}
            </div>
            <div class="flex flex-[3_1_auto] items-center justify-center">
                <a href="{{ route('photo', ['photo' => $photo->id]) }}" class="block h-16 w-16">
                    <img src="/images/graphics/zoom-icon.png" class="h-full w-full" />
                </a>
            </div>
            <div class="flex-[0_1_auto]">{{ preg_split("/\n/", wordwrap($photo->description, 80))[0] }}
            </div>
        </div>
    </div>
</article>
