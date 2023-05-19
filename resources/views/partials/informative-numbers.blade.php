<section class="mx-0 bg-zinc-800 py-[50px] text-white">
    <div class="container grid grid-cols-12 gap-y-6 text-center">
        <div class="col-span-12 flex items-center justify-center gap-x-4 sm:col-span-6 lg:col-span-3">
            <i class="fa-solid fa-users text-5xl"></i>
            <div>
                <span class="counter block text-[2.5em] leading-9" data-target="{{ $member_count }}">0</span>
                <span class="block">Members</span>
            </div>
        </div>
        <div class="col-span-12 flex items-center justify-center gap-x-4 sm:col-span-6 lg:col-span-3">
            <i class="fa-solid fa-images text-5xl"></i>
            <div>
                <span class="counter block text-[2.5em] leading-9" data-target="{{ $photo_count }}">0</span>
                <span class="block">Photos</span>
            </div>
        </div>
        <div class="col-span-12 flex items-center justify-center gap-x-4 sm:col-span-6 lg:col-span-3">
            <i class="fa-solid fa-calendar-check text-5xl"></i>
            <div>
                <span class="counter block text-[2.5rem] leading-9" data-target="{{ $event_count }}">0</span>
                <span class="block">Events</span>
            </div>
        </div>
        <div class="col-span-12 flex items-center justify-center gap-x-4 sm:col-span-6 lg:col-span-3">
            <i class="fa-solid fa-award text-5xl"></i>
            <div>
                <span class="counter block text-[2.5rem] leading-9" data-target="20">0</span>
                <span class="block">Achievements</span>
            </div>
        </div>
    </div>
</section>
