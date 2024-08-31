@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Cliente</h1>
    <p><strong>Nombre:</strong> {{ $client->nombre }}</p>
    <p><strong>Apellidos:</strong> {{ $client->apellidos }}</p>
    <p><strong>DNI:</strong> {{ $client->dni }}</p>
    <p><strong>Fecha de Alta:</strong> {{ $client->fecha_alta }}</p>
    <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning">Editar</a>
</div>
@endsection
