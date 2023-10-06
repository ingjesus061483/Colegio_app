@extends('shared/layout')
@section('title','Crear nota')
@section('content')  
<div class="card mb-4">
    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>                    
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{url('/')}}/notas" autocomplete="off" method="post">
            @csrf            
            <div class="mb-3">
                <label class="form-label" for="nombre">
                    Concepto
                </label>
                <input type="text" name="concepto" value="{{old('concepto')}}" class="form-control" id="codigo">
            </div>
            <div class="mb-3">
                <label class="form-label" for="nombre">
                    Valor
                </label>
                <input type="text" name="valor" value="{{old('valor')}}" class="form-control" id="nombre">
            </div>           
            <div class ="mb-3">
                <label class="form-label" for="descripcion">
                    Estudiante
                </label>
                <input type="text" name="estudiante" value="{{old('estudiante')}}" class="form-control" id="estudiante">
            </div>
            <div class="mb-3">
                <label class="form-label" for="curso">
                    Asignatura
                </label>
                <select type="text" name="asignatura" class="form-select"
                id="curso">
                    <option value="">seleccione una asignatura</option>
                    @foreach($asignaturas as $item)
                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                    @endforeach
                </select> 
            </div>
            <a class="btn btn-primary" href="{{url('/')}}/notas">
                Regresar
            </a> 
            <button class="btn btn-success" type="submit">
                Guardar
            </button>
        </form>
    </div>
</div>



@endsection