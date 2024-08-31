<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\GasQuality;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Muestra el listado de clientes.
     */
    public function index()
    {
        // Cargar relaciones para evitar consultas adicionales
        $clients = Client::with('gasQuality.provider')->orderBy('created_at', 'desc')->paginate(10);
        return view('clients.index', compact('clients'));
    }

    /**
     * Muestra el formulario para crear un nuevo cliente.
     */
    public function create()
    {
        // Obtener todas las calidades de gas para el select
        $gasQualities = GasQuality::with('provider')->get();
        return view('clients.create', compact('gasQualities'));
    }

    /**
     * Almacena un nuevo cliente en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:clients,dni',
            'fecha_alta' => 'required|date',
            'gas_quality_id' => 'required|exists:gas_qualities,id',
            'precio_compra' => 'required|numeric|min:0',
            'precio_venta' => 'required|numeric|min:0',
        ]);

        Client::create($request->all());

        return redirect()->route('clients.index')->with('success', 'Cliente creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar un cliente existente.
     */
    public function edit(Client $client)
    {
        $gasQualities = GasQuality::with('provider')->get();
        return view('clients.edit', compact('client', 'gasQualities'));
    }

    /**
     * Actualiza un cliente existente en la base de datos.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:clients,dni,' . $client->id,
            'fecha_alta' => 'required|date',
            'gas_quality_id' => 'required|exists:gas_qualities,id',
            'precio_compra' => 'required|numeric|min:0',
            'precio_venta' => 'required|numeric|min:0',
        ]);

        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Elimina un cliente de la base de datos.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
