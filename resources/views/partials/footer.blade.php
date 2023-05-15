<footer class="bg-gray-100 py-20">
    <div class="container relative">
        <div class="grid grid-cols-12 gap-x-4 gap-y-8 pb-20 border-b-[1px] border-b-gray-300 relative">
            <div class="col-span-12 lg:col-span-6">
                <h3 class="mb-6">CADEXSA</h3>
                <p class="text-justify lg:w-3/4 mb-4">The Cadenelle Ex-student Association is an initiative of the
                    ex-students of the 2019
                    batch of the <span class='font-[inter-semiBold]'>La Cadenelle Anglo Saxon
                        College</span> situated at pk 10, Douala Bassa after the Ndokoti Junction</p>
                <a href="{{ route('about') }}" class="block text-blue-500">Read more</a>
            </div>
            <div class="col-span-12 xs:col-span-6 sm:col-span-4 lg:col-span-2">
                <h3 class="mb-6">About Us</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('about') . '#mission' }}">Mission</a></li>
                    <li><a href="{{ route('about') . '#vision' }}">Vision</a></li>
                    <li><a href="{{ route('about') . '#occupations' }}">Occupations</a></li>
                    <li><a href="{{ route('about') . '#administration' }}">Administration</a></li>
                    <li><a href="{{ route('about') . '#testimonials' }}">Testimonials</a></li>
                </ul>
            </div>
            <div class="col-span-12 xs:col-span-6 sm:col-span-4 lg:col-span-2">
                <h3 class="mb-6">Useful Links</h3>
                <ul class="space-y-3">
                    @foreach ([['News', '#'], ['Events', '#'], ['Gallery', '#'], ['Donate', '#'], ['Sponsor', '#']] as $link)
                        <li><a href="{{ $link[1] }}">{{ $link[0] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-span-12 sm:col-span-4 lg:col-span-2">
                <h3 class="mb-6">Contact Us</h3>
                <ul class="space-y-3 break-all">
                    <li class="flex gap-x-4">
                        <i class="fa-solid fa-phone-alt pt-2"></i>
                        <div class="space-y-1">
                            <div>{{ env('MAIN_PHONE') }}</div>
                            <div>{{ env('SECONDARY_PHONE') }}</div>
                        </div>
                    </li>
                    <li class="flex items-center gap-x-4">
                        <i class="fa-solid fa-envelope"></i>
                        <span>info@cadexsa.org</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pt-2">
            Copyrights &copy; 2019 - {{ date('Y') }}. Cadenelle Ex-Students Association. All rights
            reserved
        </div>
        <div id="scrollToTopButton"
            class="w-12 h-12 flex text-gray-100 cursor-pointer text-[2em] rounded-3xl justify-center items-center bg-blue-500 absolute bottom-[6rem] xs:bottom-[5rem] md:bottom-12 lg:-bottom-6 right-4 sm:right-0">
            <i class="fa-solid fa-angle-up"></i>
        </div>
    </div>
</footer>
