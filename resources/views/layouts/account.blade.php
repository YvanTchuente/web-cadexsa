<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $user->fullname() }} - CADEXSA</title>

    <link rel="shortcut icon" href="/images/graphics/favicon.jpg" sizes="50x50">

    <link href="/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="/fontawesome/css/solid.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        #account-navigation::-webkit-scrollbar {
            width: 0.25rem;
        }

        #account-navigation::-webkit-scrollbar-track {
            background: transparent;
        }

        #account-navigation::-webkit-scrollbar-thumb {
            background: #555;
            border-radius: 0.5rem;
        }
    </style>
    @yield('head-scripts')
    @yield('styles')
</head>

<body>
    @include('partials.loader')
    @include('partials.header')

    <main class="container my-6 sm:my-12">
        <div class="flex flex-col gap-y-8 sm:flex-row sm:justify-center sm:items-center gap-x-8 mb-6">
            <img src="{{ $user->avatar }}" class="w-[5rem] sm:w-[8rem] h-[5rem] sm:h-[8rem] rounded-full"
                alt="profile picture">
            <div class="space-y-4">
                <h1 class="sm:text-4xl capitalize leading-none">{{ $user->fullname() }}</h1>
                <div>{{ $user->city }}, {{ $user->country }}</div>
                @if ($user->id === auth()->user()->id)
                    <div class="flex flex-col gap-y-2 sm:flex-row sm:gap-x-2">
                        <a href="{{ route('settings.profile') }}" class="rounded-button inline-block w-fit">
                            Edit profile
                        </a>
                        <a href="{{ route('settings.general') }}" class="rounded-button inline-block w-fit">
                            Edit account
                        </a>
                    </div>
                @else
                    <div class="text-gray-400">
                        {{ $user->field_of_study->value }} student of the {{ $user->batch }}
                        batch
                    </div>
                @endif
            </div>
        </div>
        <div class="space-y-8">
            <nav class="w-full border-b-[1px] border-b-gray-200 sm:flex sm:justify-center">
                <ul class="py-8 w-full flex sm:justify-center gap-x-9 whitespace-nowrap overflow-y-hidden"
                    id="account-navigation">
                    @foreach ([['profile', route('member.profile', ['username' => $user->username])], ['news articles', route('member.articles', ['username' => $user->username])], ['photos', route('member.photos', ['username' => $user->username])]] as $link)
                        <li>
                            <a href="{{ $link[1] }}"
                                class="capitalize font-[inter-semiBold] hover:text-blue-400 @if (url()->current() === $link[1]) text-blue-500 @endif">
                                {{ $link[0] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
            @yield('page')
        </div>
    </main>

    @include('partials.footer')
    @yield('scripts')
</body>

</html>
