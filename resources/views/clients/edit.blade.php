@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($client) ? 'Editar Cliente' : 'Nuevo Cliente' }}</h1>
    <form action="{{ isset($client) ? route('clients.update', $client) : route('clients.store') }}" method="POST">
        @csrf
        @if(isset($client))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $client->nombre ?? '') }}">
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ old('apellidos', $client->apellidos ?? '') }}">
        </div>
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni', $client->dni ?? '') }}">
        </div>
        <div class="form-group">
            <label for="fecha_alta">Fecha de Alta</label>
            <input type="date" class="form-control" id="fecha_alta" name="fecha_alta" value="{{ old('fecha_alta', $client->fecha_alta ?? '') }}">
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($client) ? 'Actualizar' : 'Crear' }}</button>
    </form>
</div>
@endsection
