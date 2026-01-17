<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sitio;

class BalController extends Controller
{
    /**
     * Mostrar listado de balnearios
     */
    public function index()
    {
        $balnearios = Sitio::where('categoria', 'Balneario')->get();

        return view('balnearios.index', compact('balnearios'));
    }

    /**
     * Mostrar detalle de un balneario
     */
    public function show($id)
    {
        $balneario = Sitio::where('categoria', 'Balneario')
                          ->where('id_sitio', $id)
                          ->firstOrFail();

        return view('balnearios.show', compact('balneario'));
    }
}
