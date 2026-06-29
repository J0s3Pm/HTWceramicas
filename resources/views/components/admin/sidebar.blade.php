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
            <a href="{{ route('productos') }}">
                📦 Productos
            </a>
        </li>

        <li>
            <a href="{{ route('atributos') }}">
                📏 Atributos
            </a>
        </li>

        <li>
            <a href="{{ route('clientes') }}">
                👥 Clientes
            </a>
        </li>

        <li>
            <a href="{{ route('pedidos') }}">
                🛒 Pedidos
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
