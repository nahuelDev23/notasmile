<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nota;
class NotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notas            = $request->all();
        $notas            = Nota::create($notas);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Nota $notas)
    {
        return $notas;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return Nota::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $notas)
    {
        $notas->delete();
        return true;
    }
   /**
     * API
     * 
     */

    public function mostrarNotas($id)
    {
        $receta = Nota::Where('id',$id)->get();
        return $receta;
    }

    public function listaNotas(Request $request)
    {
        $notas = Nota::orderBy('id','DESC')->paginate(10);
        return [
            'pagination'=>[
                'total' => $notas->total(),
                'current_page' => $notas->currentPage(),
                'per_page' => $notas->perPage(),
                'last_page' => $notas->lastPage(),
                'from' => $notas->firstItem(),
                'to' => $notas->lastItem(),
            ],
            'notas' => $notas

        ];
    }
    public function buscarNotas(Request $request)
    {
        $receta = Nota::where('title','like',"%$request->title%")->paginate(10);
        return [
            'pagination'=>[
                'total' => $receta->total(),
                'current_page' => $receta->currentPage(),
                'per_page' => $receta->perPage(),
                'last_page' => $receta->lastPage(),
                'from' => $receta->firstItem(),
                'to' => $receta->lastItem(),
            ],
            'recetas' => $receta

        ];
    }
}
