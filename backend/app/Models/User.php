<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Campos que se pueden guardar masivamente
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',  // campo nuevo para roles
    ];

    /**
     * Campos ocultos cuando se devuelve JSON
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
