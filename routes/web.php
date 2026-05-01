<?php

use App\Http\Controllers\ObjetivoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ReceberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('pago', [PagoController::class,'index']);
Route::get('pago/meses/{ano?}', [PagoController::class, 'meses']);
Route::get('pago/pago/{mes}/{ano}', [PagoController::class, 'pago']);
Route::get('pago/create', [PagoController::class, 'create']);
Route::post('pago', [PagoController::class, 'store']);
Route::get('pago/{id}/edit', [PagoController::class, 'edit']);
Route::put('pago/{id}', [PagoController::class, 'update']);
Route::delete('pago/{id}', [PagoController::class, 'destroy']);

Route::get('receber/create', [ReceberController::class, 'create']);
Route::post('receber', [ReceberController::class, 'store']);
Route::get('receber/{id}/edit', [ReceberController::class, 'edit']);
Route::put('receber/{id}', [ReceberController::class, 'update']);
Route::delete('receber/{id}', [ReceberController::class, 'destroy']);
Route::get('receber/receber/{mes}/{ano}', [ReceberController::class, 'receber']);


Route::get('objetivo/create', [ObjetivoController::class, 'create']);
Route::post('objetivo', [ObjetivoController::class, 'store']);
Route::get('objetivo/{id}/edit', [ObjetivoController::class, 'edit']);
Route::put('objetivo/{id}', [ObjetivoController::class, 'update']);
Route::delete('objetivo/{id}', [ObjetivoController::class, 'destroy']);
Route::get('objetivo', [ObjetivoController::class, 'objetivo']);
Route::get('objetivo/{id}/ver', [ObjetivoController::class, 'verObjetivo']);




