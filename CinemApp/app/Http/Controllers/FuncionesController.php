<?php

namespace App\Http\Controllers;

use App\Funcion;
use App\Pelicula;
use App\Silla;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FuncionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function find(Request $request)
    {
        $validData = $request->validate([
            'date' => 'date'
        ]);

        $peliculas = null;
        $mensaje = null;

        if (array_key_exists('date', $validData)) {
            $date = $validData['date'];

            if ($this->fechaMenorActual($date)) {
                $mensaje = "Las funciones de la fecha seleccionada ya terminaron";
            } else {
                $peliculas = Pelicula::whereHas('funciones', function ($query) use ($date) {
                    $query->where('hora_inicio', '>=', date($date))
                        ->where('hora_inicio', '<=', date($date) . ' 23:59:59');
                })->with(['funciones' => function ($query) use ($date) {
                    $query->where('hora_inicio', '>=', date($date))
                        ->where('hora_inicio', '<=', date($date) . ' 23:59:59');
                }])->get();

                if ($this->hayFunciones($peliculas)) {
                    $mensaje = "No hay funciones programadas para la fecha seleccionada";
                }
            }
        }

        return view('BuscarFunciones', [
            'peliculas' => $peliculas,
            'mensaje' => $mensaje
        ]);
    }

    public function realizarReserva(Request $request, $id)
    {
        $funcion = Funcion::findOrFail($id);
        $usuario = $request->user();

        $reserva = $funcion->getReservaPorUsuario($usuario);
        $sillasOcupadas = $funcion->getSillasOcupadas($usuario);

        $sillas = [];
        foreach ($funcion->sala->sillas as $silla) {
            array_push($sillas,
                ['id' => $silla->id,
                    'letra' => $silla->letra,
                    'numero' => $silla->numero,
                    'esGeneral' => $silla->esGeneral,
                    'estaReservada' => $reserva->sillas->contains($silla),
                    'estaOcupada' => $sillasOcupadas->contains($silla)]
            );
        }

        return view('realizarReserva',
            ['funcion' => $funcion,
                'sillas' => $sillas,
                'reserva' => $reserva]
        );
    }

    public function confirmarRealizarReserva(Request $request, $id)
    {
        $funcion = Funcion::findOrFail($id);

        if (!($funcion->horasParaIniciar >= 2))
        {
            return redirect(route('realizarReserva', $id))
                ->withErrors(['No se puede realizar la reserva porque faltan menos de dos horas para que inicie la función']);
        }
        return redirect(route('realizarReserva', $id))
            ->with('mensaje', 'Reserva realizada correctamente');
    }

    public function reservarSilla(Request $request, $id, $sillaID)
    {
        $funcion = Funcion::findOrFail($id);
        $silla = Silla::findOrFail($sillaID);
        $usuario = $request->user();

        if ($funcion->getSillasOcupadas($usuario)->contains($silla)) {
            return redirect(route('realizarReserva', $id))
                ->withErrors(['La silla seleccionada no se encuentra disponible, por favor seleccione otra']);
        }

        $reserva = $funcion->getReservaPorUsuario($usuario);
        if ($reserva->sillas->contains($silla)) {
            $reserva->sillas()->detach($silla);

            if ($reserva->sillas()->count() == 0) {
                $reserva->delete();
            }
        } else if ($reserva->sillas()->count() >= 5) {
            return redirect(route('realizarReserva', $id))
                ->withErrors(['No se pueden seleccionar más de 5 sillas por función']);
        } else {
            $reserva->sillas()->attach($silla);
        }

        return redirect(route('realizarReserva', $id));
    }

    public function fechaMenorActual($date)
    {
        $hoy = date("Y-m-d");

        return $date < $hoy;
    }

    public function hayFunciones($peliculas)
    {
        return $peliculas->isEmpty();
    }

    public function listarFunciones(Request $request)
    {
        $peliculas = Pelicula::all();
        $mensaje = null;

        if ($this->hayFunciones($peliculas)) {
            $mensaje = "No hay funciones programadas";
        }

        return view('listarFunciones', [
            'peliculas' => $peliculas,
            'mensaje' => $mensaje
        ]);
    }

    public function create()
    {
        return view('crearFunciones');
    }

}
