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
        <div class="lg:w-[900px] sm:mx-auto space-y-8">
            <div class="flex items-center gap-x-6">
                <img src="{{ $user->avatar }}" class="w-12 sm:w-16 h-12 sm:h-16 rounded-full" alt="profile picture">
                <h2 class="capitalize leading-none">
                    <a href="{{ route('member.profile', ['username' => $user->username]) }}">
                        {{ $user->fullname() }}
                    </a>
                    <span class="text-gray-300 px-2">/</span>
                    @yield('page')
                </h2>
            </div>
            <div class="grid grid-cols-12 gap-y-8 md:gap-x-8">
                <nav class="col-span-12 md:col-span-3">
                    <ul class="space-y-4 hidden sm:block">
                        @foreach ([['fa-solid fa-cog', 'general', route('settings.general')], ['fa-solid fa-user-cog', 'profile', route('settings.profile')], ['fa-solid fa-lock', 'password', route('settings.password')]] as $link)
                            <li class="block">
                                <a href="{{ $link[2] }}"
                                    class="capitalize hover:text-blue-400 @if (url()->current() === $link[2]) font-[inter-semiBold] text-blue-500 @endif">
                                    <i class="{{ $link[0] }} pr-2"></i>
                                    <span>{{ $link[1] }}</span>
                                </a>
                            </li>
                        @endforeach
                        <li
                            class="before:content-[''] before:block before:my-4 before:w-full before:border-t-[1px] before:border-gray-100">
                            <a href="#" class="text-red-500"><i
                                    class="fa-solid fa-trash-can pr-2"></i><span>Delete account</span></a>
                        </li>
                    </ul>
                    <div class="dropdown relative sm:hidden">
                        <div
                            class="opener relative cursor-pointer rounded-md bg-white py-2 pl-6 pr-12 border-2 border-gray-300 after:content-[''] after:block after:absolute after:inset-y-[35%] after:right-4 after:w-[10px] after:h-[10px] after:border-b-4 after:border-b-gray-500 after:border-r-4 after:border-r-gray-500 after:rotate-45 after:transition duration-300 capitalize">
                            {{ substr(request()->route()->getName(),9) }}
                        </div>
                        <ul
                            class="dropdown-list w-full top-[110%] left-0 overflow-hidden shadow-lg border-[1px] border-solid border-gray-300 rounded">
                            @foreach ([['fa-solid fa-cog', 'account', route('settings.general')], ['fa-solid fa-user-cog', 'profile', route('settings.profile')]] as $link)
                                <li
                                    class="py-2 px-6 @if (!$loop->last) border-b-[1px] border-solid border-gray-300 @endif">
                                    <a href="{{ $link[2] }}"
                                        class="block capitalize hover:text-blue-400 @if (url()->current() === $link[2]) text-blue-500 @endif">
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
