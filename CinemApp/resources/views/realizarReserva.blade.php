@extends('layouts.app')

@section('content')
    <div class="container">
        @isset($funcion)
            <div class="row">
                <div class="col-md-4">
                    <div class="px-5 mb-3">
                        <img class="img-fluid" src="{{$funcion->pelicula->portada}}" alt="Película">
                    </div>
                    <div class="text-center">
                        <strong>Fecha: </strong>{{ $funcion->fechaConFormato }}
                        <strong>Hora: </strong>{{ $funcion->horaConFormato }}
                        <strong>Sala: </strong>{{ $funcion->sala->numero }}
                    </div>
                    <div class="mt-3">
                        <table class="table table-sm table-hover text-center">
                            <thead>
                            <tr>
                                <th scope="col">Silla</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Precio</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($misSillas as $silla)
                                <tr>
                                    <td>
                                        {{ $silla->letra . $silla->numero }}
                                    </td>
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
                <div class="col-md-8 bg-secondary">
                    <div class="card mx-5 bg-dark text-white">
                        <div class="card-body text-center p-1">
                            <h3 class="font-weight-bold">PANTALLA</h3>
                        </div>
                    </div>
                    <br/>
                    <table class="mx-auto">
                        <tbody>
                        @for ($i = 0; $i < $funcion->sala->filas; $i++)
                            <tr>
                                @for ($j = 0; $j < $funcion->sala->columnas; $j++)
                                    @php ($silla = $sillas[$i*$funcion->sala->columnas+$j])
                                    <td>
                                        <button type="button" class="btn btn-block btn-sm btn-circle
                                               {{$silla['estaReservada'] ?
                                                    'btn-success' : (
                                                 $silla['estaOcupada'] ?
                                                    'btn-danger' : (
                                                  $silla['esGeneral'] ?
                                                    'btn-light' :
                                                    'btn-warning')) }}">
                                            {{$silla['letra']}}
                                            {{$silla['numero']}}
                                        </button>
                                    </td>
                                @endfor
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                    <div class="row mt-5 mx-5 text-center">
                        <div class="col-3">
                            <button type="button" class="disabled btn btn-light btn-sm btn-circle"></button>
                            General
                        </div>
                        <div class="col-3">
                            <button type="button" class="disabled btn btn-warning btn-sm btn-circle"></button>
                            Preferencial
                        </div>
                        <div class="col-3">
                            <button type="button" class="disabled btn btn-danger btn-sm btn-circle"></button>
                            Ocupado
                        </div>
                        <div class="col-3">
                            <button type="button" class="disabled btn btn-success btn-sm btn-circle"></button>
                            Mis reservas
                        </div>
                    </div>
                </div>
            </div>
        @endisset
    </div>

@endsection
