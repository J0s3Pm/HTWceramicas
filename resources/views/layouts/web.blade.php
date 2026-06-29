<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Hatun Wasi' }}</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    @fluxAppearance

</head>

<body class="bg-white text-gray-800 antialiased">

    <x-navbar />

    <main>

        {{ $slot }}

    </main>

    <x-footer />

</body>

</html>
