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


#Listar notas

#general recetas y notas
Route::post('receta/store','RecetaController@store')->name('receta.store');
Route::get('receta/edit/{receta}','RecetaController@edit')->name('receta.edit');
Route::get('receta/listar/','RecetaController@listar')->name('receta.listar'); #test
Route::get('mostrar/receta/{id}','RecetaController@mostrarReceta')->name('mostrar.receta');
Route::get('receta/buscar/{category}','RecetaController@buscarReceta')->name('receta.buscar');
Route::put('receta/update/{receta}','RecetaController@update')->name('receta.update');
Route::delete('receta/eliminar/{receta}','RecetaController@destroy')->name('receta.destroy');

Route::post('notas/store','NotasController@store')->name('notas.store');
Route::put('notas/update/{notas}','NotasController@update')->name('notas.update');
Route::get('notas/edit/{notas}','NotasController@edit')->name('notas.edit');
Route::get('mostrar/notas/{id}','NotasController@mostrarNotas')->name('mostrar.notas');
Route::get('listar/notas','NotasController@listaNotas')->name('listar.notas');
Route::get('buscar/notas','NotasController@buscarNotas')->name('buscar.notas');
Route::delete('notas/eliminar/{notas}','NotasController@destroy')->name('notas.destroy');

