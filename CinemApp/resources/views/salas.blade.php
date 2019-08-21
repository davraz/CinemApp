@extends('layouts.app')

@section('title', 'Salas')

@section('content')
    <div class="container">
        <a class="btn btn-success" href="{{route('salas.create')}}" role="button">Nueva sala</a>
        @isset($salas)
            @foreach($salas as $sala)
                <div class="card mb-3">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title">Sala: {{$sala->id}}</h5>
                        </div>
                        <div class="offset-md-2 col-md-8">
                            <div class="bg-secondary p-3">
                                <div class="card mx-5 bg-dark text-white">
                                    <div class="card-body text-center p-1">
                                        <h3 class="font-weight-bold">PANTALLA</h3>
                                    </div>
                                </div>
                                <br/>
                                <table class="mx-auto">
                                    <tbody>
                                    @for ($i = 0; $i < $sala->filas; $i++)
                                        <tr>
                                            @for ($j = 0; $j < $sala->columnas; $j++)
                                                @php ($silla = $sala->sillas[$i*$sala->columnas+$j])
                                                <td>
                                                    @csrf
                                                    <button class="btn btn-block btn-sm btn-circle
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
                                    <div class="offset-3 col-3">
                                        <button type="button" class="disabled btn btn-light btn-sm btn-circle"></button>
                                        General
                                    </div>
                                    <div class="col-3">
                                        <button type="button"
                                                class="disabled btn btn-warning btn-sm btn-circle"></button>
                                        Preferencial
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="#" class="btn btn-primary">Editar</a>
                            <a href="#" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
@endsection
