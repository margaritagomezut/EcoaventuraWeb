<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sitio;

class TurController extends Controller
{
    /**
     * Listado de sitios turísticos
     */
    public function index()
    {
        $turisticos = Sitio::where('categoria', 'Turistico')->get();

        return view('turisticos.index', compact('turisticos'));
    }

    /**
     * Detalle de un sitio turístico
     */
    public function show($id)
    {
        $turistico = Sitio::where('categoria', 'Turistico')
                          ->where('id_sitio', $id)
                          ->firstOrFail();

        return view('turisticos.show', compact('turistico'));
    }
}
