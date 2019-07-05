@extends('layouts.app')

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
                                <strong>Fecha: </strong>{{Carbon\Carbon::parse($reserva->funcion->hora_inicio)->format('Y-m-d')}}
                                <strong>Hora: </strong> {{Carbon\Carbon::parse($reserva->funcion->hora_inicio)->format('h:i A')}}
                            </p>
                            <p class="card-text"><strong>Sala: </strong>{{$reserva->funcion->sala->numero}}</p>
                            <p class="card-text">
                                <strong>Total: </strong>{{$reserva->silla_count * $reserva->silla->precio()}}</p>
                            <p class="card-text"><strong>Estado: </strong>{{$reserva->estado}}</p>
                            <a href="#" class="btn btn-success">Pagar</a>
                            <button type="submit" href="#" class="btn btn-danger">Eliminar</button>
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
                                <tr>
                                    <th scope="row">{{$reserva->silla->letra . $reserva->silla->numero}}</th>
                                    <td>{{$reserva->silla->tipo}}</td>
                                    <td>{{$reserva->silla->precio()}}</td>
                                </tr>
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
