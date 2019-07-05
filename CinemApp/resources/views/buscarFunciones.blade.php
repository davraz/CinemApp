@extends('layouts.app')

    @section('content')
    <div class="container">
        <form class="form-signin" style="padding-bottom:25px;">
            <label for="inputdate" class="sr-only">Fecha</label>
            <input type="date" id="inputdate" name="date" class="form-control" placeholder="Date" value="{{ old('date') }}"
                style="width: 200px; display:inline-block; margin-right: 5px;">
            <button type="submit" id="buttonBuscar">Buscar</button>
        </form>
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
                        <div class="col-md-4.5">
                            <img src="{{$pelicula->portada}}" class="card-img" alt="..." style="padding-top: 10px; padding-bottom: 10px; padding-left: 10px; width:300px">
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
                                                <a href="#">{{ "Sala: " . $funcion->sala->numero . " - " . Carbon\Carbon::parse($funcion['hora_inicio'])->format('h:i A') }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endisset
        </div>
    @endsection
