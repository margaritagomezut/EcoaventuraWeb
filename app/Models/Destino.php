<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // ← opcional pero recomendado

class Destino extends Model
{
    use HasFactory;
    // use SoftDeletes; // Descomenta si quieres poder "eliminar" sin borrar de BD (muy útil en admin)

    protected $table = 'destinos';          // ← plural, estándar Laravel (cambia si tu tabla se llama 'sitio')
    protected $primaryKey = 'id';           // ← estándar (si insistes en 'id_sitio', cámbialo aquí y en BD)
    public $timestamps = true;              // ← activado (created_at / updated_at) → muy útil

    protected $fillable = [
        'nombre',
        'descripcion',
        'direccion',
        'horario',
        'telefono',
        'categoria',           // ← clave: aquí va 'turistico', 'ecoturistico' o 'balneario'
        'comunidad',
        'ciudad',
        'costo',
        'foto',                // ← path o nombre del archivo de imagen
        // Si necesitas más campos (latitud, longitud, calificación, etc.) agrégalos aquí
    ];

    protected $casts = [
        'costo' => 'float',    // ← para que Laravel lo trate como número decimal
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        // 'deleted_at' => 'datetime', // si usas SoftDeletes
    ];

    // Opcional: Accesores para mostrar el nombre bonito de la categoría
    public function getCategoriaNombreAttribute(): string
    {
        return match ($this->categoria) {
            'turistico'     => 'Turístico',
            'ecoturistico'  => 'Ecoturístico',
            'balneario'     => 'Balneario',
            default         => ucfirst($this->categoria ?? 'Sin categoría'),
        };
    }

    // Opcional: Scopes para filtrar fácilmente en consultas
    public function scopeTuristicos($query)
    {
        return $query->where('categoria', 'turistico');
    }

    public function scopeEcoturisticos($query)
    {
        return $query->where('categoria', 'ecoturistico');
    }

    public function scopeBalnearios($query)
    {
        return $query->where('categoria', 'balneario');
    }

    // Si más adelante quieres agregar relación con usuario que lo creó (admin)
    // public function creador()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}