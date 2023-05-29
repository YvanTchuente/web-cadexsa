<header class="relative z-[1000] border-b-[1px] border-b-gray-200 bg-white">
    <div class="relatve container flex items-center justify-between py-6">
        <!-- Logo -->
        <div class="w-fit">
            <a href="/">
                <img src="/images/graphics/logo.png" alt="logo" class="max-h-9 sm:max-h-[60px] sm:w-[200px]" />
            </a>
        </div>
        <!-- Navigation menu -->
        <nav class="hidden xl:block">
            <ul>
                @include('partials.header-navigation-menu-links')
            </ul>
        </nav>
        @php
            $display = in_array(url()->current(), [route('login'), route('signup')]) ? 'xl:hidden' : 'flex';
        @endphp
        <div class="{{ $display }} items-center gap-x-4">
            <!-- Mobile navigation icon -->
            <div class="xl:hidden">
                @include('partials.hamburger-menu-icon')
            </div>
            @auth
                <div>
                    <a href="{{ route('photo.upload') }}" class="button mr-2">Upload</a>
                    <img src="{{ auth()->user()->avatar }}" class="mr-1 inline-block h-10 w-10 rounded-full object-cover" />
                    <i class="fa-solid fa-angle-down cursor-pointer" id="sign-in-tools-opener"></i>
                    <div class="dropdown-list top-[85%] right-[5%] w-fit rounded-2xl border-[1px] border-solid border-gray-200 p-4 text-black shadow-[0_0_0.5rem_rgba(0,0,0,0.1)]"
                        id="sign-in-tools">
                        <div
                            class="space-x-2 after:mt-3 after:mb-2 after:block after:w-full after:border-t-[1px] after:border-gray-300 after:content-['']">
                            <img src="{{ auth()->user()->avatar }}" class="inline-block h-10 w-10 rounded-full" />
                            <div class="inline-block break-all align-middle">
                                <div class="font-[inter-semiBold]">
                                    {{ auth()->user()->fullname() }}
                                </div>
                                <div class="text-sm">{{ auth()->user()->email }}</div>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <a href="{{ route('member.profile', ['username' => auth()->user()->username]) }}"
                                    class="flex w-full items-center gap-x-3 rounded-lg py-2 px-2 hover:bg-blue-100 hover:text-blue-600">
                                    <i class="fa-solid fa-user"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('member.articles', ['username' => auth()->user()->username]) }}"
                                    class="flex w-full items-center gap-x-3 rounded-lg py-2 px-2 hover:bg-blue-100 hover:text-blue-600">
                                    <i class="fa-solid fa-newspaper"></i>
                                    <span>News Articles</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('member.photos', ['username' => auth()->user()->username]) }}"
                                    class="flex w-full items-center gap-x-3 rounded-lg py-2 px-2 hover:bg-blue-100 hover:text-blue-600">
                                    <i class="fa-solid fa-images"></i>
                                    <span>Photos</span>
                                </a>
                            </li>
                            <li
                                class="before:my-2 before:block before:w-full before:border-t-[1px] before:border-gray-300 before:content-['']">
                                <a href="{{ route('settings.profile') }}"
                                    class="flex w-full items-center gap-x-3 rounded-lg py-2 px-2 hover:bg-blue-100 hover:text-blue-600">
                                    <i class="fa-solid fa-user-cog"></i>
                                    <span>Profile Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('settings.general') }}"
                                    class="flex w-full items-center gap-x-3 rounded-lg py-2 px-2 hover:bg-blue-100 hover:text-blue-600">
                                    <i class="fa-solid fa-cog"></i>
                                    <span>Account Settings</span>
                                </a>
                            </li>
                            <li
                                class="before:my-2 before:block before:w-full before:border-t-[1px] before:border-gray-300 before:content-['']">
                                <a href="{{ route('logout') }}"
                                    class="flex w-full items-center gap-x-3 rounded-lg py-2 px-2 hover:bg-blue-100 hover:text-blue-600">
                                    <i class="fa-solid fa-sign-out"></i>
                                    <span>Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endauth
            @guest
                @if (!in_array(url()->current(), [route('login'), route('signup')]))
                    <div nav class="hidden xl:block">
                        <a href="{{ route('login') }}"
                            class="button bg-white text-black hover:bg-white hover:text-blue-500">
                            Log In
                        </a>
                        <a href="{{ route('signup') }}" class="rounded-button">Sign Up</a>
                    </div>
                @endif
            @endguest
        </div>
    </div>
    <!-- Mobile navigation -->
    <nav id="mobile-navigation" class="h-0 overflow-hidden transition-all">
        <div class="container">
            <ul>
                @include('partials.mobile-header-navigation-menu-links')
            </ul>
        </div>
    </nav>
</header>
