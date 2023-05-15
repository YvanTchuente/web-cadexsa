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
        <div class="flex items-center gap-x-4">
            <!-- Mobile navigation icon -->
            <div class="xl:hidden">
                @include('partials.hamburger-menu-icon')
            </div>
            <div nav class="hidden xl:block">
                <a href="#" class="button text-black bg-white hover:bg-white hover:text-blue-500">
                    Log In
                </a>
                <a href="#" class="rounded-button">Sign Up</a>
            </div>
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
