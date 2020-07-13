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


#general recetas 
Route::get('listar/receta','RecetaController@listaReceta')->name('listar.receta');
Route::get('receta/buscar/','RecetaController@buscarReceta')->name('receta.buscar');
Route::post('receta/store','RecetaController@store')->name('receta.store');
Route::delete('receta/eliminar/{receta}','RecetaController@destroy')->name('receta.destroy');
Route::get('receta/edit/{receta}','RecetaController@edit')->name('receta.edit');
Route::put('receta/update/{receta}','RecetaController@update')->name('receta.update');
Route::get('mostrar/receta/{id}','RecetaController@mostrarReceta')->name('mostrar.receta');

#general y notas
Route::get('listar/notas','NotasController@listaNotas')->name('listar.notas');
Route::get('buscar/notas','NotasController@buscarNotas')->name('buscar.notas');
Route::put('notas/update/{notas}','NotasController@update')->name('notas.update');
Route::get('notas/edit/{notas}','NotasController@edit')->name('notas.edit');
Route::post('notas/store','NotasController@store')->name('notas.store');
Route::delete('notas/eliminar/{notas}','NotasController@destroy')->name('notas.destroy');
Route::get('mostrar/notas/{id}','NotasController@mostrarNotas')->name('mostrar.notas');
