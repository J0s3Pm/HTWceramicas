<div>

    <h2 class="mb-4">

        Dashboard

    </h2>

    <div class="row">

        <div class="col-md-3">

            <div class="card dashboard-card">

                <h5>Productos</h5>

                <h2>{{ $totalProductos }}</h2>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card dashboard-card">

                <h5>Categorías</h5>

                <h2>{{ $totalCategorias }}</h2>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card dashboard-card">

                <h5>Atributos</h5>

                <h2>{{ $totalAtributos }}</h2>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card dashboard-card">

                <h5>Clientes</h5>

                <h2>{{ $totalClientes }}</h2>

            </div>

        </div>

    </div>

    <div class="row mt-4">

        <div class="col-md-6">

            <div class="card dashboard-card">

                <h5>Pedidos Totales</h5>

                <h2>{{ $totalPedidos }}</h2>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card dashboard-card">

                <h5>Pedidos Pendientes</h5>

                <h2>{{ $pedidosPendientes }}</h2>

            </div>

        </div>

    </div>

    <div class="card mt-4">

        <div class="card-header">

            Últimos productos

        </div>

        <div class="card-body">

            @forelse($ultimosProductos as $producto)

                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">

                    <div>

                        <strong>{{ $producto->nombre }}</strong>

                        <br>

                        <small class="text-muted">

                            {{ $producto->categoria->nombre ?? 'Sin categoría' }}

                        </small>

                    </div>

                    <div>

                        <span class="badge bg-primary">

                            S/. {{ number_format($producto->precio_referencial, 2) }}

                        </span>

                    </div>

                </div>

            @empty

                <p class="text-muted mb-0">

                    No hay productos registrados aún.

                </p>

            @endforelse

        </div>

    </div>

</div>
