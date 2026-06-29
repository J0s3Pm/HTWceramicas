<nav class="navbar navbar-expand-lg shadow-sm sticky-top">

    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">

            <img src="{{ asset('images/logo/logo.png') }}"
                 alt=""
                 height="55"
                 class="me-2">

            <span class="logo-text">
                Hatun Wasi
            </span>

        </a>

        <!-- Botón Responsive -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- Menú -->
        <div class="collapse navbar-collapse" id="navbarMenu">

            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        Inicio
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Productos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Categorías
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Nosotros
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Contacto
                    </a>
                </li>

            </ul>

            <!-- Botón Login -->
            <a href="{{ route('login') }}" class="btn btn-login">

                Ingresar

            </a>

        </div>

    </div>

</nav>
