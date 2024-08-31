@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Añadir Tipo De Gas</h1>

    <form action="{{ route('gas_qualities.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre_empresa" class="form-label">Nombre</label>
            <input type="text" class="form-control @error('nombre_empresa') is-invalid @enderror" id="nombre_empresa" name="nombre_empresa" value="{{ old('nombre_empresa') }}" required>
            @error('nombre_empresa')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="pais" class="form-label">Precio</label>
            <input type="text" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais" value="{{ old('pais') }}" required>
            @error('pais')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cif" class="form-label">Proveedor</label>
            <input type="text" class="form-control @error('provider_id') is-invalid @enderror" id="cif" name="cif" value="{{ old('cif') }}" required>
            @error('cif')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('gas_qualities.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
