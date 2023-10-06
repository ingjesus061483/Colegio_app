@extends('shared/layout')
@section('title','Editar estudiantes')
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
        <form action="{{url('/estudiantes')}}/{{$estudiante->id}}" autocomplete="off" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{$estudiante->id}}" id="id" >
            <div class="mb-3">
                <label class="form-label" for="nombre">
                    Identificacion
                </label>
                <input type="text" name="identificacion" value="{{$estudiante->identificacion}}" class="form-control" id="codigo">
            </div>        
            <div class="mb-3">
                <label class="form-label" for="nombre">
                    Nombre
                </label>
                <input type="text" name="nombre" class="form-control" id="nombre" value="{{$estudiante->nombre}}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="nombre">
                    Apellido
                </label>
                <input type="text" name="apellido" value="{{$estudiante->apellido}}" class="form-control" id="nombre">
            </div>           

            <div class ="mb-3">
                <label class="form-label" for="descripcion">
                    Direccion
                </label>
                <input type="text" name="direccion" value="{{$estudiante->direccion}}" class="form-control" id="nombre">                
            </div>
            
            <div class ="mb-3">
                <label class="form-label" for="descripcion">
                    Telefono
                </label>
                <input type="text" name="telefono" value="{{$estudiante->telefono}}" class="form-control" id="nombre">                
            </div>
            <div class="mb-3">
                <label class="form-label" for="curso">
                    Curso                
                </label>
                <select type="text" name="curso" class="form-select"
                id="curso">
                    <option value="">seleccione un curso</option>
                    @foreach($cursos as $item)
                    <option value="{{$item->id}}"
                        @if($item->id==$estudiante->curso->id)
                        {{'selected'}}
                        @endif>{{$item->nombre}}</option>
                    @endforeach
                </select> 
            </div>
    
            <a class="btn btn-primary" href="{{url('/')}}/estudiantes">
                Regresar
            </a> 
            <button class="btn btn-success" type="submit">
                Guardar
            </button>
        </form>
    </div>
</div>


@endsection