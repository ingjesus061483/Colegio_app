@extends('shared/layout')
@section('title','Editar notas')
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
        <form action="{{url('/notas')}}/{{$nota->id}}" autocomplete="off" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{$nota->id}}" id="id" >
            <div class="mb-3">
                <label class="form-label" for="nombre">
                    Concepto
                </label>
                <input type="text" name="concepto" class="form-control" id="nombre" value="{{$nota->concepto}}">
            </div>
            <div class ="mb-3">
                <label class="form-label" for="descripcion">
                    Valor
                </label>
                <input type="text" name="valor" class="form-control" id="nombre" value="{{$nota->valor}}">
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