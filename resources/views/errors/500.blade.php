<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Internal Server Error</title>

    <link rel="shortcut icon" href="/images/graphics/favicon.jpg" sizes="50x50">

    <link href="/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="/fontawesome/css/solid.min.css" rel="stylesheet">

    @vite(['resources/css/app.css'])
</head>

<body class="h-full">
    <main class="grid min-h-full place-items-center bg-white py-24 px-6 sm:py-32 lg:px-8">
        <div class="text-center">
            <p class="text-base font-semibold text-indigo-600">500</p>
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Internal Server Error</h1>
            <p class="mt-6 text-base leading-7 text-gray-600">
                We're unable to find out what's happening! We suggest you to
            </p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="{{ url()->previous() }}"
                    class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Go back
                </a>
                <a href="{{ route('contact-us') }}" class="text-sm font-semibold text-gray-900">
                    Contact support <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
        </div>
    </main>
</body>

</html>
