<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('page-title') - CADEXSA</title>

    <link rel="shortcut icon" href="/images/graphics/favicon.jpg" sizes="50x50">

    <link href="/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="/fontawesome/css/solid.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('head-scripts')
    @yield('styles')
</head>

<body>
    @include('partials.loader')
    @include('partials.header')

    <main class="container my-6 sm:my-12">
        <div class="space-y-8 sm:mx-auto lg:w-[900px]">
            <div class="flex items-center gap-x-6">
                <img src="{{ $user->avatar }}" class="h-12 w-12 rounded-full sm:h-16 sm:w-16" alt="profile picture">
                <h2 class="capitalize leading-none">
                    <a href="{{ route('member.profile', ['username' => $user->username]) }}">
                        {{ $user->fullname() }}
                    </a>
                    <span class="px-2 text-gray-300">/</span>
                    @yield('page')
                </h2>
            </div>
            <div class="grid grid-cols-12 gap-y-8 md:gap-x-8">
                <nav class="col-span-12 md:col-span-3">
                    <ul class="hidden space-y-4 sm:block">
                        @foreach ([['fa-solid fa-cog', 'general', route('settings.general')], ['fa-solid fa-user-cog', 'profile', route('settings.profile')], ['fa-solid fa-lock', 'password', route('settings.password')]] as $link)
                            <li class="block">
                                <a href="{{ $link[2] }}"
                                    class="@if (url()->current() === $link[2]) font-[inter-semiBold] text-blue-500 @endif capitalize hover:text-blue-400">
                                    <i class="{{ $link[0] }} pr-2"></i>
                                    <span>{{ $link[1] }}</span>
                                </a>
                            </li>
                        @endforeach
                        <li
                            class="before:my-4 before:block before:w-full before:border-t-[1px] before:border-gray-100 before:content-['']">
                            <a href="{{ route('destroy_account') }}" class="text-red-500">
                                <i class="fa-solid fa-trash-can pr-2"></i>
                                <span>Delete account</span>
                            </a>
                        </li>
                    </ul>
                    <div class="dropdown relative sm:hidden">
                        <div
                            class="opener relative cursor-pointer rounded-md border-2 border-gray-300 bg-white py-2 pl-6 pr-12 capitalize duration-300 after:absolute after:inset-y-[35%] after:right-4 after:block after:h-[10px] after:w-[10px] after:rotate-45 after:border-b-4 after:border-r-4 after:border-b-gray-500 after:border-r-gray-500 after:transition after:content-['']">
                            {{ substr(request()->route()->getName(),9) }}
                        </div>
                        <ul
                            class="dropdown-list top-[110%] left-0 w-full overflow-hidden rounded border-[1px] border-solid border-gray-300 shadow-lg">
                            @foreach ([['fa-solid fa-cog', 'account', route('settings.general')], ['fa-solid fa-user-cog', 'profile', route('settings.profile')]] as $link)
                                <li
                                    class="@if (!$loop->last) border-b-[1px] border-solid border-gray-300 @endif py-2 px-6">
                                    <a href="{{ $link[2] }}"
                                        class="@if (url()->current() === $link[2]) text-blue-500 @endif block capitalize hover:text-blue-400">
                                        <i class="{{ $link[0] }} pr-2"></i>
                                        <span>{{ $link[1] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </nav>
                <section class="col-span-12 md:col-span-9">
                    @yield('page-content')
                </section>
            </div>
        </div>
    </main>

    @include('partials.footer')
    @yield('scripts')
</body>

</html>
