<?php

namespace App\Http\Controllers;

use App\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FuncionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Find(Request $request)
    {
        $validData = $request->validate([
            'date' => 'date'
        ]);

        $peliculas = null;
        $mensaje = null;

        if (array_key_exists('date', $validData)) {
            $date = $validData['date'];

            if($this->fechaMenorActual($date))
            {
                $mensaje = "Las funciones de la fecha seleccionada ya terminaron";
            }
            else {
                $peliculas = Pelicula::whereHas('funciones', function ($query) use ($date) {
                    $query->where('hora_inicio', '>=', date($date))
                        ->where('hora_inicio', '<=', date($date).' 23:59:59');
                })->with(['funciones' => function($query) use($date) {
                    $query->where('hora_inicio', '>=', date($date))
                        ->where('hora_inicio', '<=', date($date).' 23:59:59');
                }])->get();

                if($this->hayFunciones($peliculas)){
                    $mensaje = "No hay funciones programadas para la fecha seleccionada";
                }
            }
        }

        return view('BuscarFunciones', [
            'peliculas' => $peliculas,
            'mensaje' => $mensaje
        ]);
    }

    public function fechaMenorActual($date)
    {
        $hoy = date("Y-m-d");

        return $date < $hoy;
    }

    public function hayFunciones($peliculas){
        return $peliculas->isEmpty();
    }
}
