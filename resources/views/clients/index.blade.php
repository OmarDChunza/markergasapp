@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Clientes</h1>
    <a href="{{ route('clients.create') }}" class="btn btn-primary">Nuevo Cliente</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Fecha de Alta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
            <tr>
                <td>{{ $client->nombre }}</td>
                <td>{{ $client->apellidos }}</td>
                <td>{{ $client->dni }}</td>
                <td>{{ $client->fecha_alta }}</td>
                <td>
                    <a href="{{ route('clients.show', $client) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('clients.destroy', $client) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
