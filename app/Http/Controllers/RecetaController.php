<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receta;


class RecetaController extends Controller
{
    public function index()
    {
       
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $receta = new Receta();
        $receta->title = $request->title;
        $receta->ingrediente = $request->ingrediente;
        $receta->descripcion = $request->descripcion;
        $receta->categoria = $request->categoria;
        $receta->paso = $request->paso;
        
        $receta->save();
    
        return true;
    }

    
    public function show(Receta $receta)
    {
        return view('show',compact('receta'));
    }

  
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }

    /**
     * API
     */

    public function listaDesayuno(Request $request)
    {
        $receta = Receta::Where('categoria','desayuno')->paginate(10);
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
    public function buscarDesayuno(Request $request)
    {
        $receta = Receta::Where('categoria','desayuno')->where('title','like',"%$request->title%")->paginate(10);
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
    public function mostrarDesayuno($id)
    {
        $receta = Receta::Where('id',$id)->get();
        return $receta;
    }
}
