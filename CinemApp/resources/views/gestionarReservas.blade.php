@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Gestionar Reservas</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{session('message')}}
            </div>
        @endif

        @isset($reservas)
            @foreach($reservas as $reserva)
                <form action="/reservas/{{$reserva->id}}" method="post">
                    @csrf
                    @method('delete')
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
                            <a href="{{route('pagarReserva', $reserva->id)}}"
                               class="btn btn-success @if($reserva->pagada) disabled @endif">
                                Pagar
                            </a>
                            <button type="submit" class="btn btn-danger" @if($reserva->pagada) disabled @endif>
                                Eliminar
                            </button>
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapse{{$reserva->id}}"
                               role="button"
                               aria-expanded="false" aria-controls="collapseExample">
                                Expandir
                            </a>
                        </div>
                        <div class="card-footer collapse" id="collapse{{$reserva->id}}">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Silla</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Precio</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reserva->sillas as $silla)
                                    <tr>
                                        <th scope="row">
                                            {{ $silla->letra . $silla->numero }}
                                        </th>
                                        <td>
                                            {{ $silla->tipo }}
                                        </td>
                                        <td>
                                            {{ $silla->precio }}
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
                <br/>
            @endforeach
        @endisset
    </div>
@endsection
