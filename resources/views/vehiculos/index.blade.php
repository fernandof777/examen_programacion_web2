@extends('layouts.app')

@section('title', 'Lista de Vehículos')

@section('content')

<div class="page-header">
    <h1 class="page-title">🚗 Vehículos <span>Registrados</span></h1>
    <a href="{{ route('vehiculos.create') }}" class="btn btn-primary">
        ➕ Nuevo Vehículo
    </a>
</div>

<div class="card">
    @forelse($vehiculos as $vehiculo)
        @if($loop->first)
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Marca / Modelo</th>
                        <th>Año</th>
                        <th>Placa</th>
                        <th>Color</th>
                        <th>Propietario</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
        @endif

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <strong style="color:#e2e8f0;">{{ $vehiculo->marca }}</strong>
                            <span style="color:#64748b;"> / {{ $vehiculo->modelo }}</span>
                        </td>
                        <td><span class="badge">{{ $vehiculo->anio }}</span></td>
                        <td>
                            <code style="background:#0f172a;padding:0.2rem 0.6rem;border-radius:6px;font-size:0.85rem;color:#38bdf8;border:1px solid #334155;">
                                {{ strtoupper($vehiculo->placa) }}
                            </code>
                        </td>
                        <td>
                            <span class="color-dot" style="--dot-color: {{ strtolower($vehiculo->color) }};">
                                {{ $vehiculo->color }}
                            </span>
                        </td>
                        <td>{{ $vehiculo->propietario }}</td>
                        <td>{{ $vehiculo->telefono ?? '—' }}</td>
                        <td>
                            <div style="display:flex;gap:0.5rem;align-items:center;">
                                {{-- Botón Editar --}}
                                <a href="{{ route('vehiculos.edit', $vehiculo) }}" class="btn btn-warning" style="padding:0.4rem 0.8rem;font-size:0.8rem;">
                                    ✏️ Editar
                                </a>

                                {{-- Botón Eliminar --}}
                                <form action="{{ route('vehiculos.destroy', $vehiculo) }}" method="POST"
                                      onsubmit="return confirm('¿Estás seguro de eliminar el vehículo {{ $vehiculo->placa }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="padding:0.4rem 0.8rem;font-size:0.8rem;">
                                        🗑️ Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

        @if($loop->last)
                </tbody>
            </table>
        </div>

        {{-- Paginación --}}
        @if($vehiculos->hasPages())
        <div class="pagination-wrapper">
            {{ $vehiculos->links() }}
        </div>
        @endif

        @endif

    @empty
        <div class="empty-state">
            <div class="icon">🚘</div>
            <h3>No hay vehículos registrados</h3>
            <p>Comienza registrando el primer vehículo del taller.</p>
            <br>
            <a href="{{ route('vehiculos.create') }}" class="btn btn-primary">➕ Registrar Vehículo</a>
        </div>
    @endforelse
</div>

@endsection
