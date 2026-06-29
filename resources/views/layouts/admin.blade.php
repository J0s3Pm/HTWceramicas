<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Panel Administrativo' }}</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="admin-body">

<div class="wrapper">

    {{-- Sidebar --}}
    @include('components.admin.sidebar')

    <div class="main-content">

        {{-- Topbar --}}
        @include('components.admin.topbar')

            <main class="content p-4">

                @isset($slot)
                    {{ $slot }}
                @else
                    @yield('content')
                @endisset

            </main>

    </div>

</div>

</body>

</html>
