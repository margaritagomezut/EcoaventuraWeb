<?php

namespace App\Http\Controllers;

use App\Models\Sitio;

class EcoController extends Controller
{
    public function index()
    {
        $sitios = Sitio::where('categoria', 'Ecoturistico')->get();

        return view('ecoturisticos.index', compact('sitios'));
    }

    public function show($id)
    {
        $sitio = Sitio::where('categoria', 'Ecoturistico')
                      ->where('id_sitio', $id)
                      ->firstOrFail();

        return view('ecoturisticos.show', compact('sitio'));
    }
}

