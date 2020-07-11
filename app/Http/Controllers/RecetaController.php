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

  
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy(Receta $receta)
    {
        // $receta = Receta::findOrFail($id);
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

    /**
     * index
     */

    public function listaIndex(Request $request)
    {
        $receta = Receta::orderBy('id','DESC')->paginate(10);
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

    public function buscarIndex(Request $request)
    {
        $receta = Receta::where('title','like',"%$request->title%")->paginate(10);
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
    /**
     * DESAYUNO
     */
    public function listaDesayuno(Request $request)
    {
        $receta = Receta::Where('categoria','desayuno')->orderBy('id','DESC')->paginate(10);
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
    

    /**
     * ALMUERZO
     */
    public function listaAlmuerzo(Request $request)
    {
        $receta = Receta::Where('categoria','almuerzo')->orderBy('id','DESC')->paginate(10);
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
    public function buscarAlmuerzo(Request $request)
    {
        $receta = Receta::Where('categoria','almuerzo')->where('title','like',"%$request->title%")->paginate(10);
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
   

    /**
     * CENA
     */
    public function listaCena(Request $request)
    {
        $receta = Receta::Where('categoria','cena')->orderBy('id','DESC')->paginate(10);
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
    public function buscarCena(Request $request)
    {
        $receta = Receta::Where('categoria','cena')->where('title','like',"%$request->title%")->paginate(10);
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

        /**
     * idea
     */
    public function listaIdea(Request $request)
    {
        $receta = Receta::Where('categoria','ideas')->orderBy('id','DESC')->paginate(10);
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
    public function buscarIdea(Request $request)
    {
        $receta = Receta::Where('categoria','ideas')->where('title','like',"%$request->title%")->paginate(10);
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

    
        /**
     * merienda
     */
    public function listaMerienda(Request $request)
    {
        $receta = Receta::Where('categoria','merienda')->orderBy('id','DESC')->paginate(10);
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
    public function buscarMerienda(Request $request)
    {
        $receta = Receta::Where('categoria','merienda')->where('title','like',"%$request->title%")->paginate(10);
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

      /**
     * otros
     */
    public function listaOtros(Request $request)
    {
        $receta = Receta::Where('categoria','otros')->orderBy('id','DESC')->paginate(10);
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
    public function buscarOtros(Request $request)
    {
        $receta = Receta::Where('categoria','otros')->where('title','like',"%$request->title%")->paginate(10);
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
