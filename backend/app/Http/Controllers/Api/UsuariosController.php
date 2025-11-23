<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use App\Helpers\ApiResponse;
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

        return ApiResponse::success(
            [
                'total' => $usuarios->count(),
                'usuarios' => $usuarios
            ],
            'Lista de usuarios obtenida correctamente'
        );
    }

    /**
     * MUESTRA UN USUARIO POR ID
     * GET /api/usuarios/{id}
     */
    public function show($id)
    {
        // Validación simple
        if (!is_numeric($id)) {
            return ApiResponse::error('ID inválido', 422);
        }

        $usuario = Usuarios::find($id);

        if (!$usuario) {
            return ApiResponse::error('Usuario no encontrado', 404);
        }

        return ApiResponse::success($usuario, 'Usuario encontrado');
    }
}
