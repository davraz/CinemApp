@extends('layouts.app')

@section('title', 'Agregar medio de pago');

@section('content')
    <div class="container">
        <form method="post" action="{{route('mediosDePago.store')}}">
            @csrf
            <div class="form-group">
                <label for="numero">Número</label>
                <input type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" id="numero"
                       placeholder="Ingresa el número de la tarjeta de crédito..." value="{{old('numero')}}">
                @error('numero')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="mes_expiracion">Més de expiración</label>
                <input type="number" class="form-control @error('mes_expiracion') is-invalid @enderror"
                       name="mes_expiracion" id="mes_expiracion" placeholder="Ingresa el més de expiración..."
                       value="{{old('mes_expiracion')}}">
                @error('mes_expiracion')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="año_expiracion">Año de expiración</label>
                <input type="number" class="form-control @error('año_expiracion') is-invalid @enderror"
                       name="año_expiracion" id="año_expiracion" placeholder="Ingresa el año de expiración..."
                       value="{{old('año_expiracion')}}">
                @error('año_expiracion')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="cvv">Código de verificación</label>
                <input type="number" class="form-control @error('cvv') is-invalid @enderror" name="cvv" id="cvv"
                       placeholder="Ingresa el cvv..." value="{{old('cvv')}}">
                @error('cvv')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Agregar medio de pago</button>
                <a href="{{route('mediosDePago.index')}}" role="button" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
