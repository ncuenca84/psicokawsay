<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UsuariosController;
use App\Http\Controllers\Api\CitasController;
use App\Http\Controllers\Api\DisponibilidadController;
use App\Http\Controllers\Api\BotController;
use App\Http\Controllers\Api\PrediccionesController;

// TEST BÁSICO
Route::get('/test', function () {
    return response()->json(['message' => 'API backend funcionando OK']);
});

// 🔐 AUTENTICACIÓN
Route::post('/login', [AuthController::class, 'login']);
Route::post('/registro', [AuthController::class, 'registro']);

// RUTAS PROTEGIDAS
Route::middleware('auth:sanctum')->group(function () {

    // 👤 USUARIOS
    Route::get('/usuarios', [UsuariosController::class, 'index']);
    Route::get('/usuarios/{id}', [UsuariosController::class, 'show']);

    // 📅 CITAS
    Route::post('/citas/agendar', [CitasController::class, 'agendar']);
    Route::post('/citas/reagendar', [CitasController::class, 'reagendar']);
    Route::post('/citas/cancelar', [CitasController::class, 'cancelar']);
    Route::get('/citas/mis-citas', [CitasController::class, 'misCitas']);

    // 🕒 DISPONIBILIDAD
    Route::get('/disponibilidad', [DisponibilidadController::class, 'listar']);
    Route::post('/disponibilidad/crear', [DisponibilidadController::class, 'crear']);

    // 🤖 CHATBOT API
    Route::post('/bot/agendar', [BotController::class, 'agendar']);
    Route::post('/bot/disponibilidad', [BotController::class, 'disponibilidad']);

    // 📊 PREDICTIVO IA (placeholder)
    Route::get('/predictivo', [PrediccionesController::class, 'predecir']);
});
