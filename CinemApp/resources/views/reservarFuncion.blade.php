@extends('layouts.app')

@section('content')
    <div class="container">
        Funciones

        @isset($usuario)
            <div id='usuario' data-codigo='{{$usuario->id}}'>{{$usuario->nombre}}</div>
        @endisset

        <div>
            <div id='reserva' class='columna'>
                <h2>Sillas</h2>
                <div id='content'></div>
                <div>
                    <input type='button' value='Save' onclick='save_aforo()'>
                </div>
            </div>
            <div class='columna'>
                <table id='sala' class='sala'>
                    <tr>
                        @isset($sillas)
                            @php
                                $chair_label = '';
                            @endphp

                            @foreach($sillas as $silla)
                                @php
                                    if ( $chair_label != $silla->letra ) {
                                        // avoid first time
                                        if ( $chair_label != "" ) { echo "</tr>"; }
                                        echo "<tr><td>".$silla->letra."</td>";
                                        $chair_label = $silla->letra;
                                    }
                                    echo "<td data-chair='".$silla->id."' class='chair'>".$silla->letra.$silla->numero."</td>";
                                @endphp
                            @endforeach
                        @endisset
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection
