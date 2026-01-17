<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Hotelero;
use App\Models\Restaurantero;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /* DASHBOARD */
    public function dashboard()
    {
        $totalHoteleros = Hotelero::count();
        $totalRestaurantes = Restaurantero::count();
        $solicitudesPendientes = Usuario::where('activo', false)->count();

        return view('admin.dashboard', compact('totalHoteleros', 'totalRestaurantes', 'solicitudesPendientes'));
    }

    /* SOLICITUDES PENDIENTES */
    public function solicitudes()
    {
        // Traer hoteleros y restauranteros pendientes
        $hoteleros = Hotelero::whereHas('usuario', fn($q) => $q->where('activo', false))->get();
        $restauranteros = Restaurantero::whereHas('usuario', fn($q) => $q->where('activo', false))->get();

        return view('admin.solicitudes', compact('hoteleros', 'restauranteros'));
    }

    /* APROBAR USUARIO */
    public function aprobar($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->activo = true;
        $usuario->save();

        return back()->with('success', 'Usuario aprobado correctamente');
    }
}
