@extends('layouts.app')

@section('title','Funciones');

@section('content')
    <div class="container">
        <a class="btn btn-success" href="{{route('funciones.create')}}" role="button">Nueva función</a>
        <br />
        <br />
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
        @isset($peliculas)
            @foreach($peliculas as $pelicula)
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4 px-3 py-1">
                            <img src="{{$pelicula->portada}}" class="card-img img-fluid" alt="Película">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Título: {{$pelicula->titulo}}</h5>
                                <p class="card-text">Género: {{$pelicula->genero}}</p>
                                <p class="card-text">Director: {{$pelicula->director}}</p>
                                <p class="card-text">Duración: {{$pelicula->duracion}} minutos</p>
                                <p class="card-text">Censura: {{$pelicula->censura}} </p>
                                <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                                @isset($pelicula->funciones)
                                    <ul>
                                        @foreach($pelicula->funciones as $funcion)
                                            <li>
                                                <a href="{{route('realizarReserva', $funcion->id)}}">
                                                    {{ $funcion->salaHora }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endisset
                                <div class="text-right" >
                                    <a href="#" class="btn btn-primary">Editar</a>
                                    <a href="#" class="btn btn-danger">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
@endsection
