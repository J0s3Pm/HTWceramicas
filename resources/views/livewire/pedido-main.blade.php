<div>

    {{-- Encabezado --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold text-dark mb-1">
                Gestión de Pedidos
            </h2>

            <p class="text-muted mb-0">
                Administra los pedidos de los clientes.
            </p>

        </div>

        <button
            wire:click="create"
            class="btn btn-danger">

            <i class="bi bi-plus-circle me-2"></i>

            Nuevo Pedido

        </button>

    </div>

    {{-- Tarjetas --}}
    <div class="row mb-4">

        <div class="col-md-4">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h6 class="text-muted">

                        Total Pedidos

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

                        Pendientes

                    </h6>

                    <h2 class="fw-bold text-warning">

                        {{ $pendientes }}

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h6 class="text-muted">

                        Entregados

                    </h6>

                    <h2 class="fw-bold text-success">

                        {{ $entregados }}

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
                            placeholder="Buscar pedido...">

                    </div>

                </div>

            </div>

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>

                        <th>Cliente</th>

                        <th>Fecha</th>

                        <th>Estado</th>

                        <th width="150">

                            Acciones

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($pedidos as $pedido)

                        <tr>

                            <td>

                                {{ $pedido->id }}

                            </td>

                            <td>

                                {{ $pedido->cliente->nombre ?? '-' }}

                            </td>

                            <td>

                                {{ $pedido->fecha->format('d/m/Y') }}

                            </td>

                            <td>

                                @if($pedido->estado=='PENDIENTE')

                                    <span class="badge bg-warning">

                                        Pendiente

                                    </span>

                                @elseif($pedido->estado=='PROCESO')

                                    <span class="badge bg-info">

                                        En Proceso

                                    </span>

                                @elseif($pedido->estado=='ENTREGADO')

                                    <span class="badge bg-success">

                                        Entregado

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        Anulado

                                    </span>

                                @endif

                            </td>

                            <td>

                                <button
                                    wire:click="edit({{ $pedido->id }})"
                                    class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil-square"></i>

                                </button>

                                <button
                                    wire:click="delete({{ $pedido->id }})"
                                    class="btn btn-danger btn-sm">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center py-4">

                                No existen pedidos registrados.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

            <div class="mt-3">

                {{ $pedidos->links() }}

            </div>

        </div>

    </div>

    {{-- Modal --}}
    <flux:modal name="showform">

        <div class="space-y-5">

            <div>

                <flux:heading size="lg">

                    {{ $pedido_id ? 'Editar Pedido' : 'Nuevo Pedido' }}

                </flux:heading>

            </div>

            <flux:select
                wire:model="cliente_id"
                label="Cliente">

                <option value="">Seleccione...</option>

                @foreach($clientes as $cliente)

                    <option value="{{ $cliente->id }}">

                        {{ $cliente->nombre }} {{ $cliente->apellido }}

                    </option>

                @endforeach

            </flux:select>

            <flux:input
                wire:model="fecha"
                label="Fecha"
                type="date" />

            <flux:select
                wire:model="estado"
                label="Estado">

                <option value="PENDIENTE">Pendiente</option>

                <option value="PROCESO">En Proceso</option>

                <option value="ENTREGADO">Entregado</option>

                <option value="ANULADO">Anulado</option>

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
