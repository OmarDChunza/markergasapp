@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Calidades de Gas</h1>
    <a href="{{ route('gas_qualities.create') }}" class="btn btn-primary mb-3">Añadir Tipo De Gas</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($gas_qualities->count())
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
                @foreach($gas_qualities as $gasq)
                <tr>
                    <td>{{ $gasq->nombre }}</td>
                    <td>{{ $gasq->precio }}</td>
                    <td>{{ $gasq->provider_id }}</td>
                    <td>{{ $gasq->created_at }}</td>
                    <td>
                        <a href="{{ route('gas_qualities.edit', $gasq->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('gas_qualities.destroy', $gasq->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $gas_qualities->links() }}
    @else
        <p>No hay proveedores registrados.</p>
    @endif
</div>
@endsection
