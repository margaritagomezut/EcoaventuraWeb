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
    /* ===== MOSTRAR FORM LOGIN ===== */
    public function loginForm()
    {
        return view('auth.login');
    }

    /* ===== PROCESAR LOGIN ===== */
    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'password' => 'required',
        ]);

        // Buscar usuario por correo
        $usuario = Usuario::where('correo', $request->correo)->first();

        // Verificar credenciales
        if (! $usuario || ! Hash::check($request->password, $usuario->password)) {
            return back()->withErrors(['Credenciales incorrectas']);
        }

        // Verificar si está activo
        if (! $usuario->activo) {
            return back()->withErrors(['Tu cuenta está inactiva']);
        }

        // Guardar sesión
        session([
            'usuario_id' => $usuario->id_usuario,
            'rol' => $usuario->rol,
        ]);

        // Redirección por rol
        if ($usuario->rol === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($usuario->rol === 'turista') {
            return redirect()->route('inicio');
        }

        // Otros roles
        return redirect()->route('inicio');
    }

    /* ===== REGISTRO GENERAL ===== */
    public function registroForm()
    {
        return view('auth.registro');
    }

    /* ===== FORMULARIOS POR ROL ===== */
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

    /* ===== REGISTRO HOTELERO ===== */
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

    /* ===== REGISTRO RESTAURANTERO ===== */
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

        if (! $usuario) {
            return back()->withErrors(['Correo no encontrado']);
        }

        $usuario->password = Hash::make($request->password);
        $usuario->save();

        return redirect()->route('login')
            ->with('success', 'Contraseña actualizada');
    }

    /* ===== LOGOUT ===== */
    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
