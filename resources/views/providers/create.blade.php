@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Añadir Proveedor</h1>

    <form action="{{ route('providers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre_empresa" class="form-label">Nombre de la Empresa</label>
            <input type="text" class="form-control @error('nombre_empresa') is-invalid @enderror" id="nombre_empresa" name="nombre_empresa" value="{{ old('nombre_empresa') }}" required>
            @error('nombre_empresa')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="pais" class="form-label">País</label>
            <input type="text" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais" value="{{ old('pais') }}" required>
            @error('pais')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cif" class="form-label">CIF</label>
            <input type="text" class="form-control @error('cif') is-invalid @enderror" id="cif" name="cif" value="{{ old('cif') }}" required>
            @error('cif')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="fecha_alta" class="form-label">Fecha de Alta</label>
            <input type="date" class="form-control @error('fecha_alta') is-invalid @enderror" id="fecha_alta" name="fecha_alta" value="{{ old('fecha_alta') }}" required>
            @error('fecha_alta')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('providers.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
