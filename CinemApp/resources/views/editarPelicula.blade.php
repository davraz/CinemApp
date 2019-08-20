@extends('layouts.app')

@section('title', 'Editar película');

@section('content')
    @isset($pelicula)
        <div class="container">
            <form method="post" action="{{route('peliculas.update', $pelicula->id)}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" id="titulo"
                           placeholder="Ingresa el título..." value="{{$pelicula->titulo}}">
                    @error('titulo')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="genero">Género</label>
                    <input type="text" class="form-control @error('genero') is-invalid @enderror" name="genero" id="genero"
                           placeholder="Ingresa el género..." value="{{$pelicula->genero}}">
                    @error('genero')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="director">Director</label>
                    <input type="text" class="form-control @error('director') is-invalid @enderror" name="director"
                           id="director"
                           placeholder="Ingresa el director..." value="{{$pelicula->director}}">
                    @error('director')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="duracion">Duración</label>
                    <input type="number" class="form-control @error('duracion') is-invalid @enderror" name="duracion"
                           id="duracion"
                           placeholder="Ingresa la duración..." value="{{$pelicula->duracion}}">
                    @error('duracion')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="censura">Censura</label>
                    <input type="text" class="form-control @error('censura') is-invalid @enderror" name="censura"
                           id="censura"
                           placeholder="Ingresa la censura..." value="{{$pelicula->censura}}">
                    @error('censura')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="portada">Portada</label>
                    <input type="text" class="form-control @error('portada') is-invalid @enderror" name="portada"
                           id="portada"
                           placeholder="Ingresa la URL de la portada..." value="{{$pelicula->portada}}">
                    @error('portada')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Actualizar película</button>
                    <a href="{{route('peliculas.index')}}" role="button" class="btn btn-danger">Cancelar</a>
                </div>

            </form>
        </div>
    @endisset
@endsection
