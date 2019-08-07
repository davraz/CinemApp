@extends('layouts.app')

@section('content')
    <div class="container">
        Película
        <div>
            @isset($funcion)
                <table>
                    <tbody>
                    @for ($i = 0; $i < $funcion->sala->filas; $i++)
                        <tr>
                            @for ($j = 0; $j < $funcion->sala->columnas; $j++)
                                @php
                                    $silla = $funcion->sala->sillas[$i*$funcion->sala->columnas+$j];
                                @endphp
                                <td>
                                    @if($reserva->sillas->where('id', $silla->id)->first() != null)
                                        <button type="button"
                                                class="btn btn-success">
                                            {{$silla->letra}}
                                            {{$silla->numero}}
                                        </button>
                                    @else
                                        <button type="button"
                                                class="btn btn-outline-{{ $silla->esGeneral ? 'dark' : 'primary'}}">
                                            {{$silla->letra}}
                                            {{$silla->numero}}
                                        </button>
                                    @endif


                                </td>
                            @endfor
                        </tr>
                    @endfor
                    </tbody>
                </table>
            @endisset
        </div>
    </div>

@endsection
