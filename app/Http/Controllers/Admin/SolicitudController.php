<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usuario;  // Cambia a User si usas el modelo estándar de Laravel
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SolicitudAprobada;
use App\Mail\SolicitudRechazada;

class SolicitudController extends Controller
{
    /**
     * Muestra la lista de solicitudes pendientes.
     */
    public function index()
    {
        $solicitudes = Usuario::whereIn('rol', ['hotelero', 'restaurantero'])
            ->where('estado', 'pendiente')  // Ajusta 'estado' y 'pendiente' según tu BD
            ->latest()
            ->paginate(10);

        return view('admin.solicitudes.index', compact('solicitudes'));
    }

    /**
     * Aprueba una solicitud y cambia el estado.
     */
    public function aprobar(Usuario $usuario)
    {
        if (!in_array($usuario->rol, ['hotelero', 'restaurantero'])) {
            return redirect()->back()->with('error', 'No es una solicitud válida.');
        }

        if ($usuario->estado !== 'pendiente') {
            return redirect()->back()->with('error', 'Esta solicitud ya fue procesada.');
        }

        $usuario->update([
            'estado' => 'aprobado',
            // Opcional: 'aprobado_at' => now(),
        ]);

        // Opcional: Enviar email de aprobación
        // Mail::to($usuario->email)->send(new SolicitudAprobada($usuario));

        return redirect()
            ->route('admin.solicitudes.index')
            ->with('success', 'Solicitud aprobada correctamente. El usuario ya puede acceder.');
    }

    /**
     * Rechaza una solicitud y cambia el estado.
     */
    public function rechazar(Usuario $usuario)
    {
        if (!in_array($usuario->rol, ['hotelero', 'restaurantero'])) {
            return redirect()->back()->with('error', 'No es una solicitud válida.');
        }

        if ($usuario->estado !== 'pendiente') {
            return redirect()->back()->with('error', 'Esta solicitud ya fue procesada.');
        }

        $usuario->update([
            'estado' => 'rechazado',
            // Opcional: 'rechazado_at' => now(),
        ]);

        // Opcional: Enviar email de rechazo
        // Mail::to($usuario->email)->send(new SolicitudRechazada($usuario));

        return redirect()
            ->route('admin.solicitudes.index')
            ->with('success', 'Solicitud rechazada correctamente.');
    }
}