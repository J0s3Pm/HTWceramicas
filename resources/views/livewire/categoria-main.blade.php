<div>

    {{-- Encabezado --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold text-dark mb-1">
                Gestión de Categorías
            </h2>

            <p class="text-muted mb-0">
                Administra las categorías de los productos.
            </p>

        </div>

        <button
            wire:click="create"
            class="btn btn-danger">

            <i class="bi bi-plus-circle me-2"></i>

            Nueva Categoría

        </button>

    </div>

    {{-- Tarjetas --}}
    <div class="row mb-4">

        <div class="col-md-4">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h6 class="text-muted">

                        Total Categorías

                    </h6>

                    <h2 class="fw-bold text-primary">

                        {{ $total }}

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h6 class="text-muted">

                        Activas

                    </h6>

                    <h2 class="fw-bold text-success">

                        {{ $activas }}

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h6 class="text-muted">

                        Inactivas

                    </h6>

                    <h2 class="fw-bold text-danger">

                        {{ $inactivas }}

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
                            placeholder="Buscar categoría...">

                    </div>

                </div>

            </div>

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>

                        <th>Categoría</th>

                        <th>Estado</th>

                        <th>Registrado por</th>

                        <th>Fecha</th>

                        <th width="150">

                            Acciones

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($categorias as $categoria)

                        <tr>

                            <td>

                                {{ $categoria->id }}

                            </td>

                            <td>

                                {{ $categoria->nombre }}

                            </td>

                            <td>

                                @if($categoria->estado=='ACTIVO')

                                    <span class="badge bg-success">

                                        Activo

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        Inactivo

                                    </span>

                                @endif

                            </td>

                            <td>

                                {{ $categoria->user->name }}

                            </td>

                            <td>

                                {{ $categoria->created_at->format('d/m/Y') }}

                            </td>

                            <td>

                                <button
                                    wire:click="edit({{ $categoria->id }})"
                                    class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil-square"></i>

                                </button>

                                <button
                                    wire:click="delete({{ $categoria->id }})"
                                    class="btn btn-danger btn-sm">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center py-4">

                                No existen categorías registradas.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

            <div class="mt-3">

                {{ $categorias->links() }}

            </div>

        </div>

    </div>

    {{-- Modal --}}
    <flux:modal name="showform">

        <div class="space-y-5">

            <div>

                <flux:heading size="lg">

                    {{ $categoria_id ? 'Editar Categoría' : 'Nueva Categoría' }}

                </flux:heading>

            </div>

            <flux:input
                wire:model="nombre"
                label="Nombre"
                placeholder="Ingrese el nombre" />

            <flux:select
                wire:model="estado"
                label="Estado">

                <option value="ACTIVO">

                    Activo

                </option>

                <option value="INACTIVO">

                    Inactivo

                </option>

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
