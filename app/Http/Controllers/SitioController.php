<?php

namespace App\Http\Controllers;

use App\Models\Sitio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SitioController extends Controller
{
    // =====================
    // LISTADOS
    // =====================

    public function balnearios()
    {
        $sitios = Sitio::where('categoria', 'Balneario')->get();
        return view('balnearios.index', compact('sitios'));
    }

    public function ecoturisticos()
    {
        $sitios = Sitio::where('categoria', 'Ecoturistico')->get();
        return view('ecoturisticos.index', compact('sitios'));
    }

    public function turisticos()
    {
        $sitios = Sitio::where('categoria', 'Turistico')->get();
        return view('turisticos.index', compact('sitios'));
    }

    // =====================
    // DETALLE
    // =====================

    public function showBalneario($id)
    {
        $sitio = Sitio::findOrFail($id);
        return view('balnearios.show', compact('sitio'));
    }

    public function showEcoturistico($id)
    {
        $sitio = Sitio::findOrFail($id);
        return view('ecoturisticos.show', compact('sitio'));
    }

    public function showTuristico($id)
    {
        $sitio = Sitio::findOrFail($id);
        return view('turisticos.show', compact('sitio'));
    }

    // =====================
    // STORE
    // =====================

    public function store(Request $request)
    {
        $request->validate([
            'nombre'      => 'required|string|max:255',
            'categoria'   => 'required|string',
            'descripcion' => 'required|string',
            'direccion'   => 'nullable|string',
            'comunidad'   => 'nullable|string',
            'ciudad'      => 'nullable|string',
            'telefono'    => 'nullable|string',
            'horario'     => 'nullable|string',
            'costo'       => 'nullable|numeric',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $rutaFoto = null;
        if ($request->hasFile('foto')) {
            $rutaFoto = $request->file('foto')->store('sitios', 'public');
        }

        Sitio::create([
            'nombre'      => $request->nombre,
            'categoria'   => $request->categoria,
            'descripcion' => $request->descripcion,
            'direccion'   => $request->direccion,
            'comunidad'   => $request->comunidad,
            'ciudad'      => $request->ciudad,
            'telefono'    => $request->telefono,
            'horario'     => $request->horario,
            'costo'       => $request->costo,
            'foto'        => $rutaFoto,
        ]);

        return match ($request->categoria) {
            'Balneario'    => redirect()->route('balnearios.index'),
            'Ecoturistico' => redirect()->route('ecoturisticos.index'),
            'Turistico'    => redirect()->route('turisticos.index'),
            default        => redirect()->route('inicio'),
        };
    }
}


