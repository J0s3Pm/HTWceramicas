<div>

    {{-- Encabezado --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold text-dark mb-1">
                Gestión de Productos
            </h2>

            <p class="text-muted mb-0">
                Administra los productos del catálogo.
            </p>

        </div>

        <button
            wire:click="create"
            class="btn btn-danger">

            <i class="bi bi-plus-circle me-2"></i>

            Nuevo Producto

        </button>

    </div>

    {{-- Tarjetas --}}
    <div class="row mb-4">

        <div class="col-md-12">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h6 class="text-muted">

                        Total Productos

                    </h6>

                    <h2 class="fw-bold text-primary">

                        {{ $total }}

                    </h2>

                </div>

            </div>

        </div>

    </div>

    {{-- Tabla --}}
    <div class="card shadow border-0">

        <div class="card-body">

            <div class="row mb-3">

                <div class="col-md-4">

                    <div class="input-group">

                        <span class="input-group-text">

                            <i class="bi bi-search"></i>

                        </span>

                        <input
                            wire:model.live="search"
                            type="text"
                            class="form-control"
                            placeholder="Buscar producto...">

                    </div>

                </div>

            </div>

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>

                        <th>Nombre</th>

                        <th>Modelo</th>

                        <th>Precio</th>

                        <th>Categoría</th>

                        <th width="150">

                            Acciones

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($productos as $producto)

                        <tr>

                            <td>

                                {{ $producto->id }}

                            </td>

                            <td>

                                {{ $producto->nombre }}

                            </td>

                            <td>

                                {{ $producto->modelo ?: '-' }}

                            </td>

                            <td>

                                S/. {{ number_format($producto->precio_referencial, 2) }}

                            </td>

                            <td>

                                {{ $producto->categoria->nombre ?? '-' }}

                            </td>

                            <td>

                                <button
                                    wire:click="edit({{ $producto->id }})"
                                    class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil-square"></i>

                                </button>

                                <button
                                    wire:click="delete({{ $producto->id }})"
                                    class="btn btn-danger btn-sm">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center py-4">

                                No existen productos registrados.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

            <div class="mt-3">

                {{ $productos->links() }}

            </div>

        </div>

    </div>

    {{-- Modal --}}
    <flux:modal name="showform">

        <div class="space-y-5">

            <div>

                <flux:heading size="lg">

                    {{ $producto_id ? 'Editar Producto' : 'Nuevo Producto' }}

                </flux:heading>

            </div>

            <flux:input
                wire:model="nombre"
                label="Nombre"
                placeholder="Ingrese el nombre" />

            <flux:input
                wire:model="modelo"
                label="Modelo"
                placeholder="Ingrese el modelo" />

            <flux:input
                wire:model="precio_referencial"
                label="Precio Referencial"
                type="number"
                placeholder="0.00" />

            <flux:select
                wire:model="categoria_id"
                label="Categoría">

                <option value="">Seleccione...</option>

                @foreach($categorias as $categoria)

                    <option value="{{ $categoria->id }}">

                        {{ $categoria->nombre }}

                    </option>

                @endforeach

            </flux:select>

            <div class="d-flex justify-content-end gap-2">

                <flux:button
                    variant="ghost"
                    x-on:click="$flux.modal('showform').close()">

                    Cancelar

                </flux:button>

                <flux:button
                    wire:click="save"
                    variant="primary">

                    Guardar

                </flux:button>

            </div>

        </div>

    </flux:modal>

</div>
