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
        //return view('show',compact('receta'));
    }

  
    public function edit(Receta $receta)
    {
        return $receta;
    }

    
    public function update(Request $request, $id)
    {
        
        // $receta = Receta::Find($id);
        // $receta->title = $request->title;
        // // $receta->ingrediente = $request->ingrediente;
        //  $receta->descripcion = $request->descripcion;
        // $receta->categoria = $request->categoria;
        // // $receta->paso = $request->paso;
        
        // $receta->save();
        //Receta::find($id)->update($request->all());
        return Receta::find($id)->update($request->all());
    
    }

   
    public function destroy(Receta $receta)
    {
        $receta->delete();
        return true;
    }

    /**
     * API
     * 
     */

    public function mostrarReceta($id)
    {
        $receta = Receta::Where('id',$id)->get();
        return $receta;
    }

    
    #test listar
    public function listar(Request $request)
    {
        if($request->category == 'index')
        {
            $receta = Receta::orderBy('id','DESC')->paginate(10);
        }
        else
        {
            $receta = Receta::Where('categoria',$request->category)->paginate(10);
        }
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

    #test buscar
    public function buscarReceta(Request $request,$category)
    {
        if($category == 'index')
        {
            $receta = Receta::where('title','like',"%$request->title%")->paginate(10);
        }
        else
        {
            $receta = Receta::Where('categoria',$category)->where('title','like',"%$request->title%")->paginate(10);
        }
        
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
