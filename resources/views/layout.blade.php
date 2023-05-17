<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IoT 2023</title>

    @vite('resources/css/app.css')
</head>
<body class="antialiased bg-gray-950 text-gray-200 font-mono">
    <header>
        @include('includes.nav')
    </header>
    <main class="max-w-4xl mt-4 mx-auto">
        @yield('content')
    </main>
</body>
</html>
