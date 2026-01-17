<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotelero extends Model
{
    protected $table = 'turista';
    protected $primaryKey = 'id_turista';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apaterno',
        'amaterno',
        'id_usuario'
    ];
}
