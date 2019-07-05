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
        @if(isset($reserva) && isset($mediosDePago))
            <form method="post" action="/reservas/{{$reserva->id}}/pagar">
                @csrf
                <h4>Seleccione el medio de pago</h4>
                <select name="medioDePago" class="form-control" name="product_id">
                    @foreach ($mediosDePago as $medioDePago)
                        <option value="{{ $medioDePago->id }}">
                            {{ $medioDePago->tipo }}
                        </option>
                    @endforeach
                </select>
                <br/>
                <input type="submit" class="btn btn-success" value="Pagar">
            </form>

        @endif
    </div>
@endsection
