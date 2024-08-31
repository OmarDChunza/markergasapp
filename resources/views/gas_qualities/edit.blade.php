@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Proveedor</h1>

    <form action="{{ route('gas_qualities.update', $gasq->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre_empresa" class="form-label">Nombre</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre', $gasq->nombre) }}" required>
            @error('nombre_empresa')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="pais" class="form-label">Precio</label>
            <input type="text" class="form-control @error('precio') is-invalid @enderror" id="precio" name="precio" value="{{ old('precio', $gasq->precio) }}" required>
            @error('pais')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cif" class="form-label">Proveedor</label>
            <input type="text" class="form-control @error('provider_id') is-invalid @enderror" id="provider_id" name="provider_id" value="{{ old('provider_id', $gasq->provider_id) }}" required>
            @error('cif')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('gas_qualities.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
