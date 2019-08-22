@extends('layouts.app')

@section('title', 'Crear función');

@section('content')
    @if(isset($peliculas) && isset($salas))
        <div class="container">
            <form method="post" action="{{route('funciones.store')}}">
                @csrf
                <div class="form-group">
                    <label for="titulo">Película</label>
                    <select id="pelicula" name="pelicula" class="form-control @error('pelicula') is-invalid @enderror">
                        @foreach ($peliculas as $pelicula)
                            <option value="{{ $pelicula->id }}">
                                {{ $pelicula->titulo }}
                            </option>
                        @endforeach
                    </select>
                    @error('pelicula')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sala">Sala</label>
                    <select id="sala" name="sala" class="form-control @error('sala') is-invalid @enderror">
                        @foreach ($salas as $sala)
                            <option value="{{ $sala->id }}">
                                {{ $sala->numero }}
                            </option>
                        @endforeach
                    </select>
                    @error('sala')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" id="fecha"
                           placeholder="Ingresa la fecha..." value="{{old('fecha')}}">
                    @error('fecha')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hora_inicio">Hora de inicio</label>
                    <input type="time" class="form-control @error('hora_inicio') is-invalid @enderror"
                           name="hora_inicio" id="hora_inicio" placeholder="Ingresa la hora de inicio..."
                           value="{{old('hora_inicio')}}">
                    @error('hora_inicio')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Crear función</button>
                    <a href="{{route('funciones.index')}}" role="button" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    @endif
@endsection
