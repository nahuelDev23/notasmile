<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receta;
use Laravel\Ui\Presets\React;

class RecetaController extends Controller
{
    public function index()
    {
        $receta = Receta::all();
        return $receta;
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

    public function listaDesayuno()
    {
        $receta = Receta::Where('categoria','desayuno')->get();
        return $receta;
    }
    public function mostrarDesayuno($id)
    {
        $receta = Receta::Where('id',$id)->get();
        return $receta;
    }
}
