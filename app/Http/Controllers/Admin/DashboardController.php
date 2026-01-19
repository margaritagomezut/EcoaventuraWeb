<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destino;
use App\Models\Usuario;  // o el modelo que uses para hoteleros/restauranteros (ajusta si es diferente)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Conteo total de destinos
        $totalDestinos = Destino::count();

        // Solicitudes pendientes (ejemplo: usuarios con rol 'hotelero' o 'restaurantero' que estén pendientes)
        // Ajusta esta consulta según cómo manejes el estado "pendiente" en tu sistema
        // Suponiendo que tienes una columna 'estado' = 'pendiente' o similar en la tabla users/usuarios
        $solicitudesPendientes = Usuario::whereIn('rol', ['hotelero', 'restaurantero'])
            ->where('estado', 'pendiente')  // ← cambia 'estado' y 'pendiente' por tus campos reales
            ->count();

        // Último destino agregado
        $ultimoDestino = Destino::latest()->first();

        return view('admin.dashboard.index', compact(
            'totalDestinos',
            'solicitudesPendientes',
            'ultimoDestino'
        ));
    }
}