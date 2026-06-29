<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar Sesión | Hatun Wasi</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="login-page">

<div class="container-fluid p-0">
    <div class="row g-0 min-vh-100">

        <!-- Panel Izquierdo -->
        <div class="col-lg-7 d-none d-lg-flex login-banner">

            <div class="overlay"></div>

            <div class="banner-content">

                <img src="{{ asset('images/logo.png') }}" class="login-logo" alt="Hatun Wasi">

                <h1>Hatun Wasi</h1>

                <h4>Sistema Administrativo</h4>

                <p>
                    Gestiona productos, categorías y el contenido del sitio web
                    desde un solo lugar.
                </p>

            </div>

        </div>

        <!-- Formulario -->
        <div class="col-lg-5 d-flex align-items-center justify-content-center">

            <div class="login-card">

                <h2>Bienvenido</h2>

                <p class="text-muted mb-4">
                    Inicia sesión para acceder al panel administrativo.
                </p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Correo electrónico
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-4">

                        <label class="form-label">
                            Contraseña
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required>

                    </div>

                    <div class="form-check mb-4">

                        <input
                            type="checkbox"
                            name="remember"
                            class="form-check-input"
                            id="remember">

                        <label class="form-check-label" for="remember">
                            Recordarme
                        </label>

                    </div>

                    <button class="btn btn-login w-100">
                        Iniciar Sesión
                    </button>

                </form>

                <a href="{{ route('home') }}" class="back-site">
                    ← Volver al sitio
                </a>

            </div>

        </div>

    </div>
</div>

</body>
</html>
