@extends('layouts.app')

@section('title', 'Registrar Vehículo')

@section('content')

<div class="page-header">
    <h1 class="page-title">➕ Registrar <span>Vehículo</span></h1>
    <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">
        ← Volver a la lista
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('vehiculos.store') }}" method="POST">
            @csrf

            <div class="form-grid">

                {{-- Marca --}}
                <div class="form-group">
                    <label class="form-label" for="marca">Marca *</label>
                    <input
                        type="text"
                        id="marca"
                        name="marca"
                        class="form-control @error('marca') is-invalid @enderror"
                        value="{{ old('marca') }}"
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
                        value="{{ old('modelo') }}"
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
                        value="{{ old('anio') }}"
                        placeholder="{{ date('Y') }}"
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
                        value="{{ old('placa') }}"
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
                        value="{{ old('color') }}"
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
                        value="{{ old('propietario') }}"
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
                        value="{{ old('telefono') }}"
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
                <button type="submit" class="btn btn-primary">
                    💾 Registrar Vehículo
                </button>
            </div>

        </form>
    </div>
</div>

@endsection
