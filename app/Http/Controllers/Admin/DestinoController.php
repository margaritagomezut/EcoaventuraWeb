<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinoController extends Controller
{
    /**
     * Muestra la lista de todos los destinos.
     */
    public function index()
    {
        $destinos = Destino::latest()->paginate(10);
        return view('admin.destinos.index', compact('destinos'));
    }

    /**
     * Muestra el formulario para crear un nuevo destino.
     */
    public function create()
    {
        return view('admin.destinos.create');
    }

    /**
     * Almacena un nuevo destino en la base de datos.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'      => 'required|string|max:255',
            'categoria'   => 'required|in:turistico,ecoturistico,balneario',
            'descripcion' => 'nullable|string|max:2000',
            'direccion'   => 'nullable|string|max:255',
            'horario'     => 'nullable|string|max:100',
            'telefono'    => 'nullable|string|max:20',
            'comunidad'   => 'nullable|string|max:100',
            'ciudad'      => 'nullable|string|max:100',
            'costo'       => 'nullable|numeric|min:0',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // máx 2MB
        ]);

        // Manejo de la foto (subida)
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('destinos', 'public');
            $validated['foto'] = $path;
        }

        Destino::create($validated);

        return redirect()
            ->route('admin.destinos.index')
            ->with('success', 'Destino creado correctamente.');
    }

    /**
     * Muestra el formulario para editar un destino existente.
     */
    public function edit(Destino $destino)
    {
        return view('admin.destinos.edit', compact('destino'));
    }

    /**
     * Actualiza un destino en la base de datos.
     */
    public function update(Request $request, Destino $destino)
    {
        $validated = $request->validate([
            'nombre'      => 'required|string|max:255',
            'categoria'   => 'required|in:turistico,ecoturistico,balneario',
            'descripcion' => 'nullable|string|max:2000',
            'direccion'   => 'nullable|string|max:255',
            'horario'     => 'nullable|string|max:100',
            'telefono'    => 'nullable|string|max:20',
            'comunidad'   => 'nullable|string|max:100',
            'ciudad'      => 'nullable|string|max:100',
            'costo'       => 'nullable|numeric|min:0',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Manejo de nueva foto (reemplaza la anterior si se sube una nueva)
        if ($request->hasFile('foto')) {
            // Borra la foto anterior si existe
            if ($destino->foto) {
                Storage::disk('public')->delete($destino->foto);
            }
            $path = $request->file('foto')->store('destinos', 'public');
            $validated['foto'] = $path;
        }

        $destino->update($validated);

        return redirect()
            ->route('admin.destinos.index')
            ->with('success', 'Destino actualizado correctamente.');
    }

    /**
     * Elimina un destino (con borrado suave si usas SoftDeletes).
     */
    public function destroy(Destino $destino)
    {
        // Borra la foto si existe
        if ($destino->foto) {
            Storage::disk('public')->delete($destino->foto);
        }

        $destino->delete();

        return redirect()
            ->route('admin.destinos.index')
            ->with('success', 'Destino eliminado correctamente.');
    }
}