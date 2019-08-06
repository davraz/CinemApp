@extends('layouts.app')

@section('content')
    <div class="container">
        <form>
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" placeholder="Ingresa el título...">
            </div>
            <div class="form-group">
                <label for="genero">Género</label>
                <input type="text" class="form-control" id="genero" placeholder="Ingresa el género...">
            </div>
            <div class="form-group">
                <label for="director">Director</label>
                <input type="text" class="form-control" id="director" placeholder="Ingresa el director...">
            </div>
            <div class="form-group">
                <label for="duracion">Duración</label>
                <input type="number" class="form-control" id="duracion" placeholder="Ingresa la duración...">
            </div>
            <div class="form-group">
                <label for="censura">Censura</label>
                <input type="text" class="form-control" id="censura" placeholder="Ingresa la censura...">
            </div>
            <div class="form-group">
                <label for="portada">Portada</label>
                <input type="text" class="form-control" id="portada" placeholder="Ingresa la URL de la portada...">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Crear película</button>
                <a href="{{url()->previous()}}" role="button" class="btn btn-danger">Cancelar</a>
            </div>

        </form>
    </div>
@endsection
