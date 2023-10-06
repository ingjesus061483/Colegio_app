@extends('shared/layout')
@section('title','Crear estudiante')
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
        <form action="{{url('/')}}/estudiantes" autocomplete="off" method="post">
            @csrf            
            <div class="mb-3">
                <label class="form-label" for="nombre">
                    Identificacion
                </label>
                <input type="text" name="identificacion" value="{{old('identificacion')}}" class="form-control" id="identificacion">
            </div>
            <div class="mb-3">
                <label class="form-label" for="nombre">
                    Nombre
                </label>
                <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" id="nombre">
            </div>           
            <div class="mb-3">
                <label class="form-label" for="nombre">
                    Apellido
                </label>
                <input type="text" name="apellido" value="{{old('apellido')}}" class="form-control" id="nombre">
            </div>           

            <div class ="mb-3">
                <label class="form-label" for="descripcion">
                    Direccion
                </label>
                <input type="text" name="direccion" value="{{old('direccion')}}" class="form-control" id="nombre">                
            </div>
            
            <div class ="mb-3">
                <label class="form-label" for="descripcion">
                    Telefono
                </label>
                <input type="text" name="telefono" value="{{old('telefono')}}" class="form-control" id="nombre">                
            </div>
            <div class="mb-3">
                <label class="form-label" for="curso">
                    Curso                
                </label>
                <select type="text" name="curso" class="form-select"
                id="curso">
                    <option value="">seleccione un curso</option>
                    @foreach($cursos as $item)
                    <option value="{{$item->id}}">{{$item->nombre}}</option>
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