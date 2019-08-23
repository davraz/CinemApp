@extends('layouts.app')

@section('title','Funciones');

@section('content')
    <div class="container">
        @if (session('mensaje'))
            <div class="alert alert-success" role="alert">
                {{session('mensaje')}}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif
        <a class="btn btn-success mb-3" href="{{route('funciones.create')}}" role="button">Nueva función</a>
        @isset($funciones)
            @foreach($funciones as $funcion)
                <div class="card my-3">
                    <div class="card-body">
                        <h4 class="card-title"><strong>Película:</strong> {{$funcion->pelicula->titulo}}</h4>
                        <p class="card-text"><strong>Sala: </strong>{{$funcion->sala->numero}}</p>
                        <p class="card-text"><strong>Fecha: </strong>{{$funcion->fechaConFormato}}</p>
                        <p class="card-text"><strong>Hora Inicio: </strong>{{$funcion->horaConFormato}}</p>
                        <p class="card-text"><strong>Hora Fin: </strong>{{$funcion->horaFinConFormato}}</p>
                        <div class="text-right">
                            <a href="{{route('funciones.edit', $funcion->id)}}" class="btn btn-primary">Editar</a>
                            <form method="post" class="d-inline" action="{{route('funciones.destroy', $funcion->id)}}"
                                  onclick="return confirm('¿Está seguro que desea eliminar la función seleccionada?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
@endsection
