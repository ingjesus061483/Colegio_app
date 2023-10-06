@extends('shared/layout')
@section('title','Listado de estudiantes')
@section('content')  
<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <br>
                <a href="{{url('/estudiantes/create')}}" class="btn btn-primary">Crear estudiantes </a>
            </div>
            <div class="col-6">
                <form action="{{url('/estudiantes')}}">
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
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Identificacion</th>
                    <th>Nombre completo</th>
                    <th>Direcccion</th>                    
                    <th>Telefono</th>
                    <th>Curso</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Identificacion</th>
                    <th>Nombre completo</th>
                    <th>Direcccion</th>                    
                    <th>Telefono</th>
                    <th>Curso</th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($estudiantes as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->identificacion}}</td>
                    <td>{{$item->nombre.' '.$item->apellido }}</td>            
                    <td>{{$item->direccion}}</td>
                    <td>{{$item->telefono}}</td>
                    <td>{{$item->curso->nombre}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{url('/estudiantes')}}/{{$item->id}}/edit">
                            Editar 
                        </a>
                    </td>
                    <td>                
                        <form action="{{url('/estudiantes')}}/{{$item->id}}" onsubmit="return validar('Desea eliminar este registro?');" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit"> Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach   
            </tbody>
        </table>
    </div>
</div>
@endsection
