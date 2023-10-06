<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreasignaturaRequest;
use App\Http\Requests\UpdateasignaturaRequest;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $data=[
            'asignaturas'=> Asignatura::all(),
          ];
          return view('Asignaturas.index',$data);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Asignaturas.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion=$request->validate([
            'codigo'=>'required|unique:asignaturas|max:50',            
            'nombre'=>'required|max:50',                       
        ]);
        $asignatura=new Asignatura();
        $asignatura->codigo =$request->codigo ;
        $asignatura->nombre =$request->nombre ;
        $asignatura->descripcion =$request->descripcion ;
        $asignatura->save();
        return redirect()->to(url('/asignaturas'));
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(asignatura $asignatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        
        $data=[
            'asignatura'=>Asignatura::find($id),
        ];
        return view('Asignaturas.edit',$data);

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,int $id)
    {
        $validacion=$request->validate([
            'codigo'=>'required|max:50|unique:asignaturas,codigo,'.$id,            
            'nombre'=>'required|max:50',    
        ]);
        
        $asignatura=Asignatura::find($id);
        $asignatura->codigo =$request->codigo ;
        $asignatura->nombre =$request->nombre ;
        $asignatura->descripcion =$request->descripcion ;
        $asignatura->save();
        return redirect()->to(url('/asignaturas'));
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $asignatura=Asignatura::find($id);
        $asignatura->delete();
        return redirect()->to(url('/asignaturas'));
        //
    }
}
