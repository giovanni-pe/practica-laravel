<?php

use App\Http\Controllers\AutorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('readautor',[AutorController::class,'index']);
Route::resource('libros',App\Http\Controllers\LibroController::class);
Route::resource('categorias',App\Http\Controllers\CategoriaController::class);
Route::resource('usuarios',App\Http\Controllers\UsuarioController::class);
Route::resource('libros',App\Http\Controllers\LibroController::class);
Route::resource('resenas',App\Http\Controllers\ResenaController::class);