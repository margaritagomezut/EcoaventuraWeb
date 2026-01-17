<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Eliminar admin previo si existiera
        Usuario::where('correo', 'admin@gmail.com')->delete();

        // Crear usuario admin
        Usuario::create([
            'correo' => 'admin@gmail.com',
            'password' => Hash::make('admin123'), // contraseña encriptada correctamente
            'rol' => 'admin',
            'activo' => 1
        ]);
    }
}


