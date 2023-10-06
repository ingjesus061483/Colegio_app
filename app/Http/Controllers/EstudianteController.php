<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreestudianteRequest;
use App\Http\Requests\UpdateestudianteRequest;
use App\Models\Curso;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function GetEstudiantes($curso){

        $data=[
            'estudiantes'=>Estudiante::select('identificacion')
                                     ->selectRaw("concat( estudiantes.nombre,' ',estudiantes.apellido) as estudiante")
                                     ->where('curso_id',$curso)->get()
        ];
        return json_encode($data);

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $curso =request()->curso;
        $estudiantes=$curso!=null?Estudiante::where('curso_id',$curso)->get():Estudiante::all() ;
       $data=[
        'estudiantes'=> $estudiantes,
        'cursos'=>Curso::all()
       ];       
       return view('Estudiantes.index',$data);
               //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=[            
            'cursos'=>Curso::all()
           ];
        return view('Estudiantes.create',$data);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion=$request->validate([
            'identificacion'=>'required|unique:estudiantes|max:50',            
            'nombre'=>'required|max:50',    
            'apellido'=>'required|max:50',                       
            'direccion'=>'required|max:50',    
            'telefono'=>'required|numeric',
            'curso'=>'required',    
        ]);

        $estudiante=new Estudiante();
        $estudiante ->identificacion=$request->identificacion;
        $estudiante ->nombre=$request->nombre;
        $estudiante->apellido=$request->apellido;
        $estudiante->direccion=$request->direccion;
        $estudiante->telefono=$request->telefono;
        $estudiante->curso_id=$request->curso;
        $estudiante->save(); 
        return redirect()->to(url('/estudiantes'));
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {       
        $data=[
         'estudiante'=> Estudiante::find($id),
         'cursos'=>Curso::all()
        ];       
        return view('Estudiantes.edit',$data);
        
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validacion=$request->validate([
            'identificacion'=>'required|max:50|unique:estudiantes,identificacion,'.$id,            
            'nombre'=>'required|max:50',    
            'apellido'=>'required|max:50',                       
            'direccion'=>'required|max:50',    
            'telefono'=>'required|numeric',
            'curso'=>'required',    
        ]);
        $estudiante= Estudiante::find ($id);
        $estudiante ->identificacion=$request->identificacion;
        $estudiante ->nombre=$request->nombre;
        $estudiante->apellido=$request->apellido;
        $estudiante->direccion=$request->direccion;
        $estudiante->telefono=$request->telefono;
        $estudiante->curso_id=$request->curso;
        $estudiante->save(); 
        return redirect()->to(url('/estudiantes'));
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $estudiante= Estudiante::find ($id);
        $estudiante->delete();
        return redirect()->to(url('/estudiantes'));
        //
    }
}
