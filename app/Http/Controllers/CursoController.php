<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorecursoRequest;
use App\Http\Requests\UpdatecursoRequest;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=[
            'cursos'=>Curso ::all(),
          ];
          return view('Cursos.index',$data); 
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Cursos.create'); 

    
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion=$request->validate([                     
            'nombre'=>'required|max:50',                       
        ]);  
        $curso=new Curso();
        $curso->nombre=$request->nombre;
        $curso->descripcion=$request->descripcion;
        $curso->save();
        return redirect()->to(url('/cursos'));
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $data=['curso'=>Curso::find($id)];
        return view('Cursos.edit',$data);


        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,int $id)
    {
        $validacion=$request->validate([                     
            'nombre'=>'required|max:50',                       
        ]);  
        $curso= Curso::find($id);
        $curso->nombre=$request->nombre;
        $curso->descripcion=$request->descripcion;
        $curso->save();
        return redirect()->to(url('/cursos'));

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $curso= Curso::find($id);
        $curso->delete(); 
        return redirect()->to(url('/cursos'));        //
    }
}
