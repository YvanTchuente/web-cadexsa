<header class="relative bg-white border-b-[1px] border-b-gray-200 z-[1000]">
    <div class="container relatve flex justify-between items-center py-6">
        <!-- Logo -->
        <div class="w-fit">
            <a href="/">
                <img src="/images/graphics/logo.png" alt="logo" class="max-h-9 sm:w-[200px] sm:max-h-[60px]" />
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
                    <img src="{{ auth()->user()->avatar }}" class="w-10 h-10 object-cover inline-block rounded-full mr-1" />
                    <i class="fa-solid fa-angle-down cursor-pointer" id="sign-in-tools-opener"></i>
                    <div class="dropdown-list w-fit top-[85%] right-[5%] border-[1px] border-solid border-gray-200 p-4 text-black rounded-2xl shadow-[0_0_0.5rem_rgba(0,0,0,0.1)]"
                        id="sign-in-tools">
                        <div
                            class="space-x-2 after:content-[''] after:block after:w-full after:mt-3 after:mb-2 after:border-t-[1px] after:border-gray-300">
                            <img src="{{ auth()->user()->avatar }}" class="inline-block rounded-full w-10 h-10" />
                            <div class="inline-block align-middle break-all">
                                <div class="font-[inter-semiBold]">
                                    {{ auth()->user()->fullname() }}
                                </div>
                                <div class="text-sm">{{ auth()->user()->email }}</div>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <a href="{{ route('member.profile', ['username' => auth()->user()->username]) }}"
                                    class="py-2 flex gap-x-3 items-center w-full rounded-lg px-2 hover:bg-blue-100 hover:text-blue-600">
                                    <i class="fa-solid fa-user"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('member.articles', ['username' => auth()->user()->username]) }}"
                                    class="py-2 flex gap-x-3 items-center w-full rounded-lg px-2 hover:bg-blue-100 hover:text-blue-600">
                                    <i class="fa-solid fa-newspaper"></i>
                                    <span>News Articles</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('member.photos', ['username' => auth()->user()->username]) }}"
                                    class="py-2 flex gap-x-3 items-center w-full rounded-lg px-2 hover:bg-blue-100 hover:text-blue-600">
                                    <i class="fa-solid fa-images"></i>
                                    <span>Photos</span>
                                </a>
                            </li>
                            <li
                                class="before:content-[''] before:block before:my-2 before:w-full before:border-t-[1px] before:border-gray-300">
                                <a href="{{ route('settings.profile') }}"
                                    class="py-2 flex gap-x-3 items-center w-full rounded-lg px-2 hover:bg-blue-100 hover:text-blue-600">
                                    <i class="fa-solid fa-user-cog"></i>
                                    <span>Profile Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('settings.general') }}"
                                    class="py-2 flex gap-x-3 items-center w-full rounded-lg px-2 hover:bg-blue-100 hover:text-blue-600">
                                    <i class="fa-solid fa-cog"></i>
                                    <span>Account Settings</span>
                                </a>
                            </li>
                            <li
                                class="before:content-[''] before:block before:my-2 before:w-full before:border-t-[1px] before:border-gray-300">
                                <a href="{{ route('logout') }}"
                                    class="py-2 flex gap-x-3 items-center w-full rounded-lg px-2 hover:bg-blue-100 hover:text-blue-600">
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
                            class="button text-black bg-white hover:bg-white hover:text-blue-500">
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
