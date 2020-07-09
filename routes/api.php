<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

#Listar desayuno
Route::get('listar/desayuno','RecetaController@listaDesayuno')->name('listar.desayuno');
Route::get('mostrar/desayuno/{id}','RecetaController@mostrarDesayuno')->name('mostrar.desayuno');

#guardar receta
Route::post('receta/store','RecetaController@store')->name('receta.store');