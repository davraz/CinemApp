@extends('layouts.app')

@section('title','Funciones');

@section('content')
    <div class="container">
        @if (session('mensaje'))
            <div class="alert alert-success" role="alert">
                {{session('mensaje')}}
            </div>
        @endif
        <a class="btn btn-success mb-3" href="{{route('funciones.create')}}" role="button">Nueva función</a>
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
                            <form method="post" action="{{route('funciones.destroy', $funcion->id)}}">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('funciones.edit', $funcion->id)}}" class="btn btn-primary">Editar</a>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
@endsection
