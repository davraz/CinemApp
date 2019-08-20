@extends('layouts.app')

@section('title', 'Películas')

@section('content')
    <div class="container">
        @if (session('mensaje'))
            <div class="alert alert-success" role="alert">
                {{session('mensaje')}}
            </div>
        @endif
        <a class="btn btn-success" href="{{route('peliculas.create')}}" role="button">Nueva película</a>
        <br />
        <br />
        @isset($peliculas)
            @foreach($peliculas as $pelicula)
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4.5">
                            <img src="{{$pelicula->portada}}" class="card-img" alt="..." style="padding-top: 10px; padding-bottom: 10px; padding-left: 10px; width:300px">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="text-right">
                                    <a href="#" class="btn btn-primary">Editar</a>
                                    <a href="#" class="btn btn-danger">Eliminar</a>
                                </div>
                                <h5 class="card-title">Título: {{$pelicula->titulo}}</h5>
                                <p class="card-text">Género: {{$pelicula->genero}}</p>
                                <p class="card-text">Director: {{$pelicula->director}}</p>
                                <p class="card-text">Duración: {{$pelicula->duracion}} minutos</p>
                                <p class="card-text">Censura: {{$pelicula->censura}} </p>
                                <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
@endsection
