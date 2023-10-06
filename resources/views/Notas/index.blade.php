@extends('shared/layout')
@section('title','Listado de notas')
@section('content')  
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>                    
        @endforeach
    </ul>
</div>
@endif

<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <form action="{{url('/notas/create')}}">
                    <br>
                <input type="hidden"value="{{isset($curso)?$curso:''}}" name="curso" >
                <button type="submit" class="btn btn-primary">Crear notas </button>
                </form>
            </div>
            <div class="col-6">
                <form action="{{url('/notas')}}">
                    <div class="row">
                        <div class="col-10">
                            <label class="form-label" for="curso">
                                curso                
                            </label>
                            <select type="text" name="curso" class="form-select"
                            id="curso">
                                <option value="">seleccione un curso</option>
                                @foreach($cursos as $item)
                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-2">
                            <br>                                                        
                            <button type="submit" class="btn btn-primary">Buscar </button>
                        </div>
                    </div>
                </form>
            </div>        
        </div>
    </div>
    <div class="card-body">
        @if(isset($curso))
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Identificacion</th>
                        <th>Nombre completo</th>
                        <th>Asignatura</th>                    
                        <th>Calificacion promedio</th>                                           
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Identificacion</th>
                        <th>Nombre completo</th>
                        <th>Asignatura</th>                    
                        <th>Calificacion promedio</th>                                            
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($notas as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->identificacion}}</td>
                        <td>{{$item->estudiante }}</td>            
                        <td>{{$item->asignatura}}</td>
                        <td>{{number_format( $item->calificacion,2)}}</td>                           
                    </tr>
                    @endforeach   
                </tbody>
            </table>
        @else
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Curso</th>
                        <th>Estudiante</th>
                        <th>Asignatura</th>   
                        <th>Concepto</th>  
                        <th>Nota</th>                    
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>                       
                        <th>Id</th>
                        <th>Curso</th>
                        <th>Estudiante</th>
                        <th>Asignatura</th>   
                        <th>Concepto</th>  
                        <th>Nota</th>      
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($notas as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->estudiante->curso->nombre}}</td>
                        <td>{{$item->estudiante->identificacion.' - '.$item->estudiante->nombre.' '.$item->estudiante->apellido }}</td>            
                        <td>{{$item->asignatura->codigo.' - '.$item->asignatura->nombre}}</td>
                        <td>{{$item->concepto}}</td>
                        <td>{{number_format( $item->valor,2)}}</td>   
                        <td>
                            <a class="btn btn-warning" href="{{url('/notas')}}/{{$item->id}}/edit">
                                Editar 
                            </a>
                        </td>
                        <td>                
                            <form action="{{url('/notas')}}/{{$item->id}}" onsubmit="return validar('Desea eliminar este registro?');" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit"> Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach   
                </tbody>
            </table>
                
        @endif
    </div>
</div>
@endsection
