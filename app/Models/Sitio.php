<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitio extends Model
{
    use HasFactory;

    protected $table = 'sitio';
    protected $primaryKey = 'id_sitio';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'direccion',
        'horario',
        'telefono',
        'categoria',
        'comunidad',
        'ciudad',
        'costo',
        'foto'
    ];
}
