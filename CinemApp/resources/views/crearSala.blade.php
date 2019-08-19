@extends('layouts.app')

@section('content')
    <div class="container">
        <form >
            <div class="form-group">
                <label for="numero">Número</label>
                <input type="number" class="form-control" id="numero" placeholder="Ingresa el número...">
            </div>
            <div class="form-group">
                <label for="filas">Filas</label>
                <input type="number" class="form-control" id="filas" placeholder="Ingresa las filas...">
            </div>
            <div class="form-group">
                <label for="columnas">Columnas</label>
                <input type="number" class="form-control" id="columnas" placeholder="Ingresa las columnas...">
            </div>           
            <div class="text-center">
                <button type="submit" class="btn btn-success">Crear sala</button>
                <a href="{{route('salas.index')}}" role="button" class="btn btn-danger">Cancelar</a>
            </div>

        </form>
    </div>
@endsection
