<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * LISTA TODOS LOS USUARIOS
     * GET /api/usuarios
     */
    public function index()
    {
        $usuarios = Usuarios::all();

        return response()->json([
            'status' => 'success',
            'total' => $usuarios->count(),
            'data' => $usuarios
        ]);
    }

    /**
     * MUESTRA UN USUARIO POR ID
     * GET /api/usuarios/{id}
     */
    public function show($id)
    {
        $usuario = Usuarios::find($id);

        if (!$usuario) {
            return response()->json([
                'status' => 'error',
                'message' => 'Usuario no encontrado'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $usuario
        ]);
    }
}
