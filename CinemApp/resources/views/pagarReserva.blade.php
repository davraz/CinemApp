@extends('layouts.app')

@section('title', 'Pagar Reserva')

@section('content')
    <div class="container">
        <h1 class="text-center">Pagar Reserva</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif
        @if (session('mensaje'))
            <div class="alert alert-success" role="alert">
                {{session('mensaje')}}
            </div>
        @endif
        @if(isset($reserva) && isset($mediosDePago))
            <div class="card">
                <div class="card-header">
                    <h4>
                        <strong>{{$reserva->funcion->pelicula->titulo}}</strong>
                    </h4>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <strong>Fecha: </strong>
                        {{ $reserva->funcion->fechaConFormato }}
                        <strong>Hora: </strong>
                        {{ $reserva->funcion->horaConFormato }}
                    </p>
                    <p class="card-text">
                        <strong>Sala: </strong>
                        {{ $reserva->funcion->sala->numero }}
                        <strong>Sillas: </strong>
                        {{ $reserva->sillasCount }}
                        <strong>Total: </strong>
                        {{ $reserva->total }}
                    </p>
                    <p class="card-text">
                        <strong>Estado: </strong>
                        {{ $reserva->estado }}
                    </p>
                </div>
            </div>
            <div class="my-3">
                <form method="post" action="{{route('pagarReserva', $reserva->id)}}">
                    @csrf
                    <h5>Seleccione el medio de pago</h5>
                    <select id="medioDePago" name="medioDePago" class="form-control">
                        @foreach ($mediosDePago as $medioDePago)
                            <option value="{{ $medioDePago->id }}">
                                {{ $medioDePago->tipo }}
                            </option>
                        @endforeach
                    </select>

                    <br/>
                    <input type="submit" class="btn btn-success" value="Pagar">
                    <a href="{{route('mediosDePago.create')}}" class="btn btn-primary">Agregar medio de pago</a>
                </form>
            </div>
        @endif
    </div>
@endsection
