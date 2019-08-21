@extends('layouts.app')

@section('title','Funciones');

@section('content')
    <div class="container">
        <a class="btn btn-success mb-3" href="{{route('funciones.create')}}" role="button">Nueva función</a>
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif
        @isset($mensaje)
            <div class="alert alert-primary" role="alert">
                {{$mensaje}}
            </div>
        @endisset
        @isset($funciones)
            @foreach($funciones as $funcion)
                <div class="card my-3">
                    <div class="card-body">
                        <h4 class="card-title"><strong>Película:</strong> {{$funcion->pelicula->titulo}}</h4>
                        <p class="card-text"><strong>Sala: </strong>{{$funcion->sala->numero}}</p>
                        <p class="card-text"><strong>Fecha: </strong>{{$funcion->hora_inicio}}</p>
                        <p class="card-text"><strong>Hora Inicio: </strong>{{$funcion->hora_inicio}}</p>
                        <p class="card-text"><strong>Hora Fin: </strong>{{$funcion->hora_fin}}</p>
                        <div class="text-right">
                            <a href="#" class="btn btn-primary">Editar</a>
                            <a href="#" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
@endsection
