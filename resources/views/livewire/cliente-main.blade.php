<div>

    {{-- Encabezado --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold text-dark mb-1">
                Gestión de Clientes
            </h2>

            <p class="text-muted mb-0">
                Administra los clientes registrados.
            </p>

        </div>

        <button
            wire:click="create"
            class="btn btn-danger">

            <i class="bi bi-plus-circle me-2"></i>

            Nuevo Cliente

        </button>

    </div>

    {{-- Tarjetas --}}
    <div class="row mb-4">

        <div class="col-md-12">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h6 class="text-muted">

                        Total Clientes

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
                            placeholder="Buscar cliente...">

                    </div>

                </div>

            </div>

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>

                        <th>Nombre</th>

                        <th>Apellido</th>

                        <th>Contacto</th>

                        <th width="150">

                            Acciones

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($clientes as $cliente)

                        <tr>

                            <td>

                                {{ $cliente->id }}

                            </td>

                            <td>

                                {{ $cliente->nombre }}

                            </td>

                            <td>

                                {{ $cliente->apellido ?: '-' }}

                            </td>

                            <td>

                                {{ $cliente->contacto ?: '-' }}

                            </td>

                            <td>

                                <button
                                    wire:click="edit({{ $cliente->id }})"
                                    class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil-square"></i>

                                </button>

                                <button
                                    wire:click="delete({{ $cliente->id }})"
                                    class="btn btn-danger btn-sm">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center py-4">

                                No existen clientes registrados.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

            <div class="mt-3">

                {{ $clientes->links() }}

            </div>

        </div>

    </div>

    {{-- Modal --}}
    <flux:modal name="showform">

        <div class="space-y-5">

            <div>

                <flux:heading size="lg">

                    {{ $cliente_id ? 'Editar Cliente' : 'Nuevo Cliente' }}

                </flux:heading>

            </div>

            <flux:input
                wire:model="nombre"
                label="Nombre"
                placeholder="Ingrese el nombre" />

            <flux:input
                wire:model="apellido"
                label="Apellido"
                placeholder="Ingrese el apellido" />

            <flux:input
                wire:model="contacto"
                label="Contacto"
                placeholder="Teléfono o correo" />

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
