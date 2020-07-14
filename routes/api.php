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

#Listar index
Route::get('listar/index','RecetaController@listaIndex')->name('listar.index');
Route::get('buscar/index','RecetaController@buscarIndex')->name('buscar.index');

#Listar desayuno
Route::get('listar/desayuno','RecetaController@listaDesayuno')->name('listar.desayuno');
Route::get('buscar/desayuno','RecetaController@buscarDesayuno')->name('buscar.desayuno');
#Route::get('mostrar/desayuno/{id}','RecetaController@mostrarDesayuno')->name('mostrar.desayuno');

#Listar almuerzo
Route::get('listar/almuerzo','RecetaController@listaAlmuerzo')->name('listar.almuerzo');
Route::get('buscar/almuerzo','RecetaController@buscarAlmuerzo')->name('buscar.almuerzo');

#Listar cena
Route::get('listar/cena','RecetaController@listaCena')->name('listar.cena');
Route::get('buscar/cena','RecetaController@buscarCena')->name('buscar.cena');

#Listar ideas
Route::get('listar/idea','RecetaController@listaIdea')->name('listar.idea');
Route::get('buscar/idea','RecetaController@buscarIdea')->name('buscar.idea');

#Listar merienda
Route::get('listar/merienda','RecetaController@listaMerienda')->name('listar.merienda');
Route::get('buscar/merienda','RecetaController@buscarMerienda')->name('buscar.merienda');

#Listar otros
Route::get('listar/otros','RecetaController@listaOtros')->name('listar.otros');
Route::get('buscar/otros','RecetaController@buscarOtros')->name('buscar.otros');

#Listar notas
Route::get('listar/notas','NotasController@listaNotas')->name('listar.notas');
Route::get('buscar/notas','NotasController@buscarNotas')->name('buscar.notas');

#general recetas y notas
Route::post('receta/store','RecetaController@store')->name('receta.store');
Route::delete('receta/eliminar/{receta}','RecetaController@destroy')->name('receta.destroy');
Route::get('receta/edit/{receta}','RecetaController@edit')->name('receta.edit');
Route::put('receta/update/{receta}','RecetaController@update')->name('receta.update');
Route::get('mostrar/receta/{id}','RecetaController@mostrarReceta')->name('mostrar.receta');

Route::put('notas/update/{notas}','NotasController@update')->name('notas.update');
Route::get('notas/edit/{notas}','NotasController@edit')->name('notas.edit');
Route::post('notas/store','NotasController@store')->name('notas.store');
Route::delete('notas/eliminar/{notas}','NotasController@destroy')->name('notas.destroy');
Route::get('mostrar/notas/{id}','NotasController@mostrarNotas')->name('mostrar.notas');

#dnd estoy