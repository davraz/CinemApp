@extends('layouts.app')

@section('content')
    <div class="container">
        <form>
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" placeholder="Ingresa el título...">
            </div>
            <div class="form-group">
                <label for="sala">Sala</label>
                <input type="number" class="form-control" id="sala" placeholder="Ingresa la sala...">
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" placeholder="Ingresa la fecha...">
            </div>
            <div class="form-group">
                <label for="hora_inicio">Hora de inicio</label>
                <input type="time" class="form-control" id="hora_inicio" placeholder="Ingresa la hora de inicio...">
            </div>
            <div class="form-group">
                <label for="hora_fin">Hora de fin</label>
                <input type="time" class="form-control" id="hora_fin" placeholder="Ingresa la hora de fin...">
            </div>            
            <div class="text-center">
                <button type="submit" class="btn btn-success">Crear función</button>
                <a href="{{route('listarFunciones')}}" role="button" class="btn btn-danger">Cancelar</a>
            </div>

        </form>
    </div>
@endsection
