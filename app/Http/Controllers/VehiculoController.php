<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Muestra la lista de todos los vehículos.
     */
    public function index()
    {
        $vehiculos = Vehiculo::latest()->paginate(10);
        return view('vehiculos.index', compact('vehiculos'));
    }

    /**
     * Muestra el formulario para crear un nuevo vehículo.
     */
    public function create()
    {
        return view('vehiculos.create');
    }

    /**
     * Almacena un nuevo vehículo en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'marca'       => 'required|string|max:100',
            'modelo'      => 'required|string|max:100',
            'anio'        => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'placa'       => 'required|string|max:20|unique:vehiculos,placa',
            'color'       => 'required|string|max:50',
            'propietario' => 'required|string|max:150',
            'telefono'    => 'nullable|string|max:20',
        ]);

        Vehiculo::create($request->all());

        return redirect()->route('vehiculos.index')
                         ->with('success', 'Vehículo registrado correctamente.');
    }

    /**
     * Muestra el formulario para editar un vehículo existente.
     */
    public function edit(Vehiculo $vehiculo)
    {
        return view('vehiculos.edit', compact('vehiculo'));
    }

    /**
     * Actualiza los datos del vehículo en la base de datos.
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        $request->validate([
            'marca'       => 'required|string|max:100',
            'modelo'      => 'required|string|max:100',
            'anio'        => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'placa'       => 'required|string|max:20|unique:vehiculos,placa,' . $vehiculo->id,
            'color'       => 'required|string|max:50',
            'propietario' => 'required|string|max:150',
            'telefono'    => 'nullable|string|max:20',
        ]);

        $vehiculo->update($request->all());

        return redirect()->route('vehiculos.index')
                         ->with('success', 'Vehículo actualizado correctamente.');
    }

    /**
     * Elimina el vehículo de la base de datos.
     */
    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();

        return redirect()->route('vehiculos.index')
                         ->with('success', 'Vehículo eliminado correctamente.');
    }
}
