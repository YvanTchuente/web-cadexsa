<article class="photo w-full h-full relative overflow-hidden">
    <img src="{{ $photo->url() }}" class="w-full h-full object-cover transition" />
    <div class="absolute top-0 left-0 w-full h-full p-6 bg-black text-white opacity-0 transition">
        <div class="w-full h-full flex flex-col">
            <div class="flex-[0_1_auto]"><i class="fa-solid fa-calendar-day mr-3"></i>{{ $photo->shot_on->format('F j, Y') }}</div>
            <div class="flex justify-center items-center flex-[3_1_auto]">
                <a href="#" class="w-16 h-16 block">
                    <img src="/images/graphics/zoom-icon.png" class="w-full h-full" />
                </a>
            </div>
            <div class="flex-[0_1_auto]">{{ preg_split("/\n/", wordwrap($photo->description, 80))[0] }}
            </div>
        </div>
    </div>
</article>
