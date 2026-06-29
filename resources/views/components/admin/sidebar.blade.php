<div class="sidebar">

    <div class="logo">

        <img src="{{ asset('images/logo.png') }}" alt="Logo">

        <h3>Hatun Wasi</h3>

    </div>

    <ul>

        <li>
            <a href="{{ route('dashboard') }}">
                📊 Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('categorias') }}">
                📁 Categorías
            </a>
        </li>

        <li>
            <a href="#">
                🏷 Marcas
            </a>
        </li>

        <li>
            <a href="#">
                📦 Productos
            </a>
        </li>

        <li>
            <a href="#">
                🖼 Banner
            </a>
        </li>

        <li>
            <a href="#">
                ℹ Nosotros
            </a>
        </li>

        <li>
            <a href="#">
                📞 Contacto
            </a>
        </li>

        <li>

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button class="logout-btn">

                    🚪 Cerrar sesión

                </button>

            </form>

        </li>

    </ul>

</div>
