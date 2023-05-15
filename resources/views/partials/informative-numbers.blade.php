<section class="text-white py-[50px] mx-0 bg-zinc-800">
    <div class="container grid grid-cols-12 gap-y-6 text-center">
        <div class="flex justify-center items-center gap-x-4 col-span-12 sm:col-span-6 lg:col-span-3">
            <i class="text-5xl fa-solid fa-users"></i>
            <div>
                <span class="counter block leading-9 text-[2.5em]" data-target="{{ $member_count }}">0</span>
                <span class="block">Members</span>
            </div>
        </div>
        <div class="flex justify-center items-center gap-x-4 col-span-12 sm:col-span-6 lg:col-span-3">
            <i class="text-5xl fa-solid fa-images"></i>
            <div>
                <span class="counter block leading-9 text-[2.5em]" data-target="{{ $photo_count }}">0</span>
                <span class="block">Photos</span>
            </div>
        </div>
        <div class="flex justify-center items-center gap-x-4 col-span-12 sm:col-span-6 lg:col-span-3">
            <i class="text-5xl fa-solid fa-calendar-check"></i>
            <div>
                <span class="counter block leading-9 text-[2.5rem]" data-target="{{ $event_count }}">0</span>
                <span class="block">Events</span>
            </div>
        </div>
        <div class="flex justify-center items-center gap-x-4 col-span-12 sm:col-span-6 lg:col-span-3">
            <i class="text-5xl fa-solid fa-award"></i>
            <div>
                <span class="counter block leading-9 text-[2.5rem]" data-target="20">0</span>
                <span class="block">Achievements</span>
            </div>
        </div>
    </div>
</section>
