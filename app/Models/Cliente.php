<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'cod_cliente',
        'nombres',
        'primer_apellido',
        'segundo_apellido',
        'correo'
    ];
}
