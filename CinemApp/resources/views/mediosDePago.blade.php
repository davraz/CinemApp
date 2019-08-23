@extends('layouts.app')

@section('title', 'Medios de pago')

@section('content')
    <div class="container">
        @if (session('mensaje'))
            <div class="alert alert-success" role="alert">
                {{session('mensaje')}}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif
        <a class="btn btn-success mb-3" href="{{route('mediosDePago.create')}}" role="button">Agregar medio de pago</a>
        @isset($mediosDePago)
            @foreach($mediosDePago as $medioDePago)
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-3 px-3 py-1">
                            @if($medioDePago->esTarjetaDeCredito)
                                <img
                                    src="https://www.mastercard.com.co/es-co/consumidores/conozca-nuestras-ofertas-y-promociones/atm/_jcr_content/contentpar/herolight/image.adaptive.479.high.jpg/1553021329780.jpg"
                                    class="card-img img-fluid p-3" alt="...">
                            @else
                                <img
                                    src="https://www.themoviecard.com.au/wp-content/uploads/2017/11/card-high-res.png"
                                    class="card-img img-fluid p-3" alt="...">
                            @endif
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                @if($medioDePago->esTarjetaDeCredito)
                                    <div class="text-right">
                                        <form method="post" class="d-inline"
                                              action="{{route('mediosDePago.destroy', $medioDePago->id)}}"
                                              onclick="return confirm('¿Está seguro que desea eliminar el medio de pago seleccionado?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                    <h5 class="card-title"><strong>Número:</strong> {{$medioDePago->numero}}</h5>
                                    <p><strong>Expiración:</strong> {{'XX/XX'}}</p>
                                    <p><strong>CVV:</strong> {{'XXX'}}</p>
                                @else
                                    <div class="text-right">
                                        <a href="{{route('mediosDePago.edit', $medioDePago->id)}}"
                                           class="btn btn-primary">Recargar</a>
                                    </div>
                                    <h5 class="card-title"><strong>Tarteja de cine</strong></h5>
                                    <p><strong>Saldo: </strong> {{$medioDePago->saldo}}</p>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
@endsection
