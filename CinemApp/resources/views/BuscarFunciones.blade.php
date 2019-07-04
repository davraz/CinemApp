@extends('layouts.base')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
        </div>
    @endif
    <form class="form-signin">
        <label for="inputdate" class="sr-only">Fecha</label>
        <input type="date" id="inputdate" name="date" class="form-control" placeholder="Date">
        <button type="submit" id="buttonBuscar">Buscar</button>
    </form>
    @isset($peliculas)
        @foreach($peliculas as $pelicula)
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{$pelicula->portada}}" class="card-img" alt="...">
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
                                @foreach($pelicula->funciones as $funcion)
                                    <a href="#">{{$funcion->hora_inicio}}</a>
                                @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endisset

@endsection