<?php

namespace App\Http\Controllers;

use App\Models\nota;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorenotaRequest;
use App\Http\Requests\UpdatenotaRequest;
use App\Models\Asignatura;
use App\Models\Curso;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $curso =request()->curso;
        if($curso==null)
        {
            $data=[ 
                'notas'=>  nota::all(),
                'cursos'=>Curso::all(),
               
            ];

        }
        else
        {
            $data=[ 
                'notas'=>  nota::select('estudiantes.id','estudiantes.identificacion')
                                ->selectRaw("concat( estudiantes.nombre,' ',estudiantes.apellido) as estudiante")
                                ->selectRaw("concat(asignaturas.codigo,'-',asignaturas.nombre) as asignatura")
                                ->selectRaw('AVG(notas.valor)calificacion')
                                ->join('estudiantes','notas.estudiante_id','=','estudiantes.id')
                                ->join ('asignaturas','notas.asignatura_id','=','asignaturas.id')
                                ->where('estudiantes.curso_id',$curso)
                                ->groupBy('notas.asignatura_id','estudiantes.id',)
                               ->get(),                               
                'cursos'=>Curso::all()  ,
                'curso'=>$curso

            ];
        }
        return view ('Notas.index',$data);



    

        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $curso=request()->curso;
        if ($curso==null)
        {
           return back()->withErrors("seleccione un curso");
        }
        $data=[
            "asignaturas"=> Asignatura::all(),
            "curso"=>$curso
        ];
        return view("Notas.create",$data);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion=$request->validate([
            'concepto'=>'required|max:50',            
            'valor'=>'required|numeric',    
            'estudiante'=>'required',            
            'asignatura'=>'required',    
            
        ]);
        $arr=explode('-',$request->estudiante);
       $estudiante= Estudiante::where('identificacion',$arr[0]) ->first();       
       if($estudiante==null)
       {
        return back()->withErrors("el estudiante no se encuentra registrado");
       }
       $valor=$request->valor;
       settype($valor,"double");
       if($valor>=0 &&$valor<=5.0)
       {        
        $nota=new nota();
        $nota->concepto=$request->concepto;
        $nota->valor=$request->valor;
        $nota->estudiante_id=$estudiante->id;
        $nota->asignatura_id=$request->asignatura;
        $nota->save();
        return redirect()->to(url('/notas'));
       }
       else{
        return back()->withErrors("la nota no se encuentra en el rango de 0-5 ");
       }
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(nota $nota)
    {
    
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $data=[        
            'nota'=> Nota::find($id)
        ];
        return view('Notas.edit',$data);

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validacion=$request->validate([
            'concepto'=>'required|max:50',            
            'valor'=>'required|numeric',          
        ]);
        $valor=$request->valor;
        settype($valor,"double");
        if($valor>=0 &&$valor<=5.0)
        {        
            $nota=Nota::find($id);        
            $nota->concepto=$request->concepto;
            $nota->valor=$request->valor;        
            $nota->save();
            return redirect()->to(url('/notas'));
        }
        else
        {
            return back()->withErrors("la nota no se encuentra en el rango de 0-5 ");
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $nota=Nota::find($id);
        $nota->delete();

        return redirect()->to(url('/notas'));
        //
    }
}
