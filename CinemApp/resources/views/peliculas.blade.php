@extends('layouts.app')

@section('title', 'Películas')

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
        <a class="btn btn-success mb-3" href="{{route('peliculas.create')}}" role="button">Nueva película</a>
        @isset($peliculas)
            @foreach($peliculas as $pelicula)
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4 px-3 py-1">
                            <img src="{{$pelicula->portada}}" class="card-img img-fluid p-3" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="text-right">
                                    <a href="{{route('peliculas.edit', $pelicula->id)}}"
                                       class="btn btn-primary">Editar</a>
                                    <form method="post" class="d-inline"
                                          action="{{route('peliculas.destroy', $pelicula->id)}}"
                                          onclick="return confirm('¿Está seguro que desea eliminar la película seleccionada?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
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
