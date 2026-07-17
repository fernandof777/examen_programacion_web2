@extends('layouts.app')

@section('title', 'Editar Vehículo')

@section('content')

<div class="page-header">
    <h1 class="page-title">✏️ Editar <span>Vehículo</span></h1>
    <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">
        ← Volver a la lista
    </a>
</div>

{{-- Info del vehículo que se está editando --}}
<div style="background:rgba(59,130,246,0.08);border:1px solid rgba(59,130,246,0.2);border-radius:10px;padding:0.875rem 1.25rem;margin-bottom:1.5rem;display:flex;align-items:center;gap:0.75rem;">
    <span style="font-size:1.25rem;">🔧</span>
    <div>
        <span style="color:#94a3b8;font-size:0.85rem;">Editando:</span>
        <strong style="color:#93c5fd;margin-left:0.5rem;">{{ $vehiculo->marca }} {{ $vehiculo->modelo }}</strong>
        <code style="margin-left:0.75rem;background:#0f172a;padding:0.15rem 0.5rem;border-radius:4px;color:#38bdf8;font-size:0.8rem;border:1px solid #334155;">
            {{ strtoupper($vehiculo->placa) }}
        </code>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('vehiculos.update', $vehiculo) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-grid">

                {{-- Marca --}}
                <div class="form-group">
                    <label class="form-label" for="marca">Marca *</label>
                    <input
                        type="text"
                        id="marca"
                        name="marca"
                        class="form-control @error('marca') is-invalid @enderror"
                        value="{{ old('marca', $vehiculo->marca) }}"
                        placeholder="Toyota, Honda, Ford..."
                        autocomplete="off"
                    >
                    @error('marca')
                        <span class="invalid-feedback">⚠️ {{ $message }}</span>
                    @enderror
                </div>

                {{-- Modelo --}}
                <div class="form-group">
                    <label class="form-label" for="modelo">Modelo *</label>
                    <input
                        type="text"
                        id="modelo"
                        name="modelo"
                        class="form-control @error('modelo') is-invalid @enderror"
                        value="{{ old('modelo', $vehiculo->modelo) }}"
                        placeholder="Corolla, Civic, Ranger..."
                        autocomplete="off"
                    >
                    @error('modelo')
                        <span class="invalid-feedback">⚠️ {{ $message }}</span>
                    @enderror
                </div>

                {{-- Año --}}
                <div class="form-group">
                    <label class="form-label" for="anio">Año *</label>
                    <input
                        type="number"
                        id="anio"
                        name="anio"
                        class="form-control @error('anio') is-invalid @enderror"
                        value="{{ old('anio', $vehiculo->anio) }}"
                        min="1900"
                        max="{{ date('Y') + 1 }}"
                    >
                    @error('anio')
                        <span class="invalid-feedback">⚠️ {{ $message }}</span>
                    @enderror
                </div>

                {{-- Placa --}}
                <div class="form-group">
                    <label class="form-label" for="placa">Placa *</label>
                    <input
                        type="text"
                        id="placa"
                        name="placa"
                        class="form-control @error('placa') is-invalid @enderror"
                        value="{{ old('placa', $vehiculo->placa) }}"
                        placeholder="ABC-1234"
                        autocomplete="off"
                        style="text-transform: uppercase;"
                    >
                    @error('placa')
                        <span class="invalid-feedback">⚠️ {{ $message }}</span>
                    @enderror
                </div>

                {{-- Color --}}
                <div class="form-group">
                    <label class="form-label" for="color">Color *</label>
                    <input
                        type="text"
                        id="color"
                        name="color"
                        class="form-control @error('color') is-invalid @enderror"
                        value="{{ old('color', $vehiculo->color) }}"
                        placeholder="Rojo, Azul, Negro..."
                        autocomplete="off"
                    >
                    @error('color')
                        <span class="invalid-feedback">⚠️ {{ $message }}</span>
                    @enderror
                </div>

                {{-- Propietario --}}
                <div class="form-group">
                    <label class="form-label" for="propietario">Propietario *</label>
                    <input
                        type="text"
                        id="propietario"
                        name="propietario"
                        class="form-control @error('propietario') is-invalid @enderror"
                        value="{{ old('propietario', $vehiculo->propietario) }}"
                        placeholder="Nombre completo del propietario"
                        autocomplete="off"
                    >
                    @error('propietario')
                        <span class="invalid-feedback">⚠️ {{ $message }}</span>
                    @enderror
                </div>

                {{-- Teléfono --}}
                <div class="form-group">
                    <label class="form-label" for="telefono">Teléfono <span style="color:#475569;">(opcional)</span></label>
                    <input
                        type="text"
                        id="telefono"
                        name="telefono"
                        class="form-control @error('telefono') is-invalid @enderror"
                        value="{{ old('telefono', $vehiculo->telefono) }}"
                        placeholder="+591 7XXXXXXX"
                        autocomplete="off"
                    >
                    @error('telefono')
                        <span class="invalid-feedback">⚠️ {{ $message }}</span>
                    @enderror
                </div>

            </div>{{-- /form-grid --}}

            <div class="form-actions">
                <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Cancelar</a>

                {{-- Botón Eliminar dentro del edit --}}
                <form action="{{ route('vehiculos.destroy', $vehiculo) }}" method="POST"
                      style="display:inline;"
                      onsubmit="return confirm('¿Estás seguro de eliminar este vehículo?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">🗑️ Eliminar</button>
                </form>

                {{-- Botón Actualizar --}}
                <button type="submit" class="btn btn-primary">
                    🔄 Actualizar Vehículo
                </button>
            </div>

        </form>
    </div>
</div>

@endsection
