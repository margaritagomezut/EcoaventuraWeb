<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Turista;
use App\Models\Hotelero;
use App\Models\Restaurantero;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /* ===== LOGIN ===== */
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'password' => 'required'
        ]);

        $usuario = Usuario::where('correo', $request->correo)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return back()->withErrors(['Credenciales incorrectas']);
        }

        if (!$usuario->activo) {
            return back()->withErrors(['Usuario inactivo']);
        }

        session([
            'usuario_id' => $usuario->id_usuario,
            'rol' => $usuario->rol
        ]);

        return match ($usuario->rol) {
            'admin' => redirect('admin.dashboard'),
            'hotelero' => redirect('hotelero.dashboard'),
            'restaurantero' => redirect('restaurantero.dashboard'),
            default => redirect('inicio')
        };
    }

    /* ===== REGISTRO GENERAL (CARDS) ===== */
    public function registroForm()
    {
        return view('auth.registro');
    }

    /* ===== FORMULARIOS DE REGISTRO POR ROL ===== */
    public function registroTuristaForm()
    {
        return view('auth.registro-turista');
    }

    public function registroHoteleroForm()
    {
        return view('auth.registro-hotelero');
    }

    public function registroRestauranteroForm()
    {
        return view('auth.registro-restaurantero');
    }

    /* ===== REGISTRO TURISTA ===== */
    public function registroTurista(Request $request)
    {
        $request->validate([
            'correo' => 'required|email|unique:usuario,correo',
            'password' => 'required|min:6',
            'nombre' => 'required',
            'apaterno' => 'required',
            'amaterno' => 'required',
        ]);

        $usuario = Usuario::create([
            'correo' => $request->correo,
            'password' => Hash::make($request->password),
            'rol' => 'turista',
            'activo' => true
        ]);

        Turista::create([
            'nombre' => $request->nombre,
            'apaterno' => $request->apaterno,
            'amaterno' => $request->amaterno,
            'id_usuario' => $usuario->id_usuario
        ]);

        return redirect()->route('login')
            ->with('success', 'Cuenta creada correctamente');
    }

    /* ===== REGISTRO HOTELERO (PENDIENTE) ===== */
    public function registroHotelero(Request $request)
    {
        $request->validate([
            'correo' => 'required|email|unique:usuario,correo',
            'password' => 'required|min:6',
            'nombre' => 'required',
            'apaterno' => 'required',
            'telefono' => 'required'
        ]);

        $usuario = Usuario::create([
            'correo' => $request->correo,
            'password' => Hash::make($request->password),
            'rol' => 'hotelero',
            'activo' => false
        ]);

        Hotelero::create([
            'nombre' => $request->nombre,
            'apaterno' => $request->apaterno,
            'amaterno' => $request->amaterno,
            'telefono' => $request->telefono,
            'id_usuario' => $usuario->id_usuario
        ]);

        return redirect()->route('login')
            ->with('success', 'Solicitud enviada. Espera aprobación del administrador.');
    }

    /* ===== REGISTRO RESTAURANTERO (PENDIENTE) ===== */
    public function registroRestaurantero(Request $request)
    {
        $request->validate([
            'correo' => 'required|email|unique:usuario,correo',
            'password' => 'required|min:6',
            'nombre' => 'required',
            'apaterno' => 'required',
            'telefono' => 'required'
        ]);

        $usuario = Usuario::create([
            'correo' => $request->correo,
            'password' => Hash::make($request->password),
            'rol' => 'restaurantero',
            'activo' => false
        ]);

        Restaurantero::create([
            'nombre' => $request->nombre,
            'apaterno' => $request->apaterno,
            'amaterno' => $request->amaterno,
            'telefono' => $request->telefono,
            'id_usuario' => $usuario->id_usuario
        ]);

        return redirect()->route('login')
            ->with('success', 'Solicitud enviada. Espera aprobación del administrador.');
    }

    /* ===== RECUPERAR PASSWORD ===== */
    public function recuperarForm()
    {
        return view('auth.recuperar');
    }

    public function recuperar(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $usuario = Usuario::where('correo', $request->correo)->first();

        if (!$usuario) {
            return back()->withErrors(['Correo no encontrado']);
        }

        $usuario->password = Hash::make($request->password);
        $usuario->save();

        return redirect()->route('login')->with('success', 'Contraseña actualizada');
    }

    /* ===== LOGOUT ===== */
    public function logout()
    {
        session()->flush();
        return redirect('login');
    }
}
