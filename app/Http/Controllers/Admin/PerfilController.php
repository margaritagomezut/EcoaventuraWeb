<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function edit()
    {
        $usuario = auth()->user();
        return view('admin.perfil.edit', compact('usuario'));
    }

    public function update(Request $request)
    {
        $usuario = auth()->user();

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255|unique:usuario,correo,' . $usuario->id_usuario . ',id_usuario',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $data = [
            'nombre' => $validated['nombre'],
            'correo' => $validated['correo'],
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($validated['password']);
        }

        $usuario->update($data);

        return back()->with('success', 'Perfil actualizado correctamente');
    }
}