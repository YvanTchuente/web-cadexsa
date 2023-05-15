<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

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

    <!-- Start website content -->
    <main>
        @yield('content')
    </main>
    <!-- End website content -->

    @include('partials.footer')
    @yield('scripts')
</body>

</html>
