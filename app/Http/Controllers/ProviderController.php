<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Muestra el listado de proveedores.
     */
    public function index()
    {
        $providers = Provider::orderBy('created_at', 'desc')->paginate(10);
        return view('providers.index', compact('providers'));
    }

    /**
     * Muestra el formulario para crear un nuevo proveedor.
     */
    public function create()
    {
        return view('providers.create');
    }

    /**
     * Almacena un nuevo proveedor en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_empresa' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'cif' => 'required|string|max:20|unique:providers,cif',
            'fecha_alta' => 'required|date',
        ]);

        Provider::create($request->all());

        return redirect()->route('providers.index')->with('success', 'Proveedor creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar un proveedor existente.
     */
    public function edit(Provider $provider)
    {
        return view('providers.edit', compact('provider'));
    }

    /**
     * Actualiza un proveedor existente en la base de datos.
     */
    public function update(Request $request, Provider $provider)
    {
        $request->validate([
            'nombre_empresa' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'cif' => 'required|string|max:20|unique:providers,cif,' . $provider->id,
            'fecha_alta' => 'required|date',
        ]);

        $provider->update($request->all());

        return redirect()->route('providers.index')->with('success', 'Proveedor actualizado exitosamente.');
    }

    /**
     * Elimina un proveedor de la base de datos.
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route('providers.index')->with('success', 'Proveedor eliminado exitosamente.');
    }
}
