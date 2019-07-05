<?php

namespace App\Http\Controllers;

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

    public function reservaPaga($reserva)
    {
        return $reserva->estado == 'Pagada';
    }
}
