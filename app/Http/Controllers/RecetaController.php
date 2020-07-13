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
    
    #para ver el detalle de una receta
    public function mostrarReceta($id)
    {
        $receta = Receta::Where('id',$id)->get();
        return $receta;
    }
    public function buscarReceta(Request $request)
    {
        if($request->categoria == 'index')
        {
            $receta = Receta::where('title','like',"%$request->title%")->paginate(10);
        }
        else
        {
          $receta = Receta::Where('categoria',$request->categoria)->where('title','like',"%$request->title%")->paginate(10);
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

    public function listaReceta(Request $request)
    {
        if($request->categoria == 'index')
        {
            $receta = Receta::orderBy('id','DESC')->paginate(10);
        }
        else
        {
            $receta = Receta::Where('categoria',$request->categoria)->orderBy('id','DESC')->paginate(10);
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
