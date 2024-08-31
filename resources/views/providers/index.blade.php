@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Proveedores</h1>
    <a href="{{ route('providers.create') }}" class="btn btn-primary mb-3">Añadir Proveedor</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($providers->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre Empresa</th>
                    <th>País</th>
                    <th>CIF</th>
                    <th>Fecha de Alta</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($providers as $provider)
                <tr>
                    <td>{{ $provider->nombre_empresa }}</td>
                    <td>{{ $provider->pais }}</td>
                    <td>{{ $provider->cif }}</td>
                    <td>{{ $provider->fecha_alta }}</td>
                    <td>
                        <a href="{{ route('providers.edit', $provider->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('providers.destroy', $provider->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este proveedor?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $providers->links() }}
    @else
        <p>No hay proveedores registrados.</p>
    @endif
</div>
@endsection
