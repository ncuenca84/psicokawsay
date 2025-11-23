<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuarios extends Model
{
    use HasFactory;

    // Nombre real de la tabla
    protected $table = 'usuarios';

    // Campos que se pueden llenar desde el controlador
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'rol'
    ];

    // Oculta el password cuando la API responde
    protected $hidden = [
        'password'
    ];
}
