@extends('shared/layout')
@section('title','')
@section('content') 
<div class="jumbotron">
    <h1 class="display-4">Colegio-app</h1>
    <p class="lead">bienvenido </p>
    <hr class="my-4">
    <p>Aplicacion para getionar las notas de estudiantes</p>
    <p> <a class ="btn btn-primary" href="{{url('/Notas')}}">Gestionar notas  </a></p>
</div>

@endsection