@extends('layouts.app')

@section('content')
    @if(isset($peliculas) && isset($salas))
        <div class="container">
            <form>
                <div class="form-group">
                    <label for="titulo">Película</label>
                    <select id="pelicula" name="pelicula" class="form-control">
                        @foreach ($peliculas as $pelicula)
                            <option value="{{ $pelicula->id }}">
                                {{ $pelicula->titulo }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sala">Sala</label>
                    <select id="pelicula" name="pelicula" class="form-control">
                        @foreach ($salas as $sala)
                            <option value="{{ $sala->id }}">
                                {{ $sala->numero }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control" id="fecha" placeholder="Ingresa la fecha...">
                </div>
                <div class="form-group">
                    <label for="hora_inicio">Hora de inicio</label>
                    <input type="time" class="form-control" id="hora_inicio" placeholder="Ingresa la hora de inicio...">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Crear función</button>
                    <a href="{{route('funciones.index')}}" role="button" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    @endif
@endsection
