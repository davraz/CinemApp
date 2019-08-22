@extends('layouts.app')

@section('title', 'Crear sala');

@section('content')
    <div class="container">
        <form method="post" action="{{route('salas.store')}}">
            @csrf
            <div class="form-group">
                <label for="numero">Número</label>
                <input type="number" class="form-control @error('numero') is-invalid @enderror" name="numero"
                       id="numero" placeholder="Ingresa el número..." value="{{old('numero')}}">
                @error('numero')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="filas">Filas</label>
                <input type="number" class="form-control @error('filas') is-invalid @enderror" name="filas" id="filas"
                       placeholder="Ingresa las filas..." value="{{old('filas')}}">
                @error('filas')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="columnas">Columnas</label>
                <input type="number" class="form-control @error('columnas') is-invalid @enderror" name="columnas"
                       id="columnas" placeholder="Ingresa las columnas..." value="{{old('columnas')}}">
                @error('columnas')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class=" text-center">
                <button type="submit" class="btn btn-success">Crear sala</button>
                <a href="{{route('salas.index')}}" role="button" class="btn btn-danger">Cancelar</a>
            </div>

        </form>
    </div>
@endsection
