<?php

namespace App\Http\Controllers;

use App\MedioDePago;
use App\Reserva;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReservasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $usuario = $request->user();

        $reservas = Reserva::where('usuario_id', $usuario->id)->withCount('silla')->get();

        return view('gestionarReservas', [
            'reservas' => $reservas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);

        if ($this->reservaPaga($reserva))
        {
            return redirect('/reservas')->withErrors(['La reserva no se puede eliminar porque ya se encuentra paga']);
        }

        $reserva->delete();

        return redirect('/reservas')->with('message', 'Reserva eliminada correctamente');
    }

    public function confirmarPagarReserva(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);

        $usuario = $request->user();

        $mediosDePago = MedioDePago::where('usuario_id', $usuario->id)->get();

        return view('pagarReserva',[
            'reserva' => $reserva,
            'mediosDePago' => $mediosDePago
        ]);
    }

    public function pagarReserva(Request $request, $id)
    {

        /*print_r( $request );

        exit(0);*/
        $medioDePagoID = $request['medioDePago'];

        $reserva = Reserva::findOrFail($id);

        $usuario = $request->user();

        $medioDePago = MedioDePago::find($medioDePagoID);

        if ($this->saldoSuficiente($reserva, $medioDePago))
        {
            $medioDePago->saldo = $medioDePago->saldo - $reserva->silla->precio();
            $medioDePago->save();

            $reserva->estado = 'Pagada';
            $reserva->save();

            return redirect('reservas/' . $id . '/pagar')->with('message', 'Pago realizado con éxito');
        }
        else {
            return redirect('reservas/' . $id . '/pagar')->withErrors(['El medio de pago seleccionado no cuenta con saldo suficiente para realizar el pago']);
        }

    }

    public function reservaPaga($reserva)
    {
        return $reserva->estado == 'Pagada';
    }

    public function saldoSuficiente($reserva, $medioDePago)
    {
        return $reserva->silla->precio() < $medioDePago->saldo;
    }
}
