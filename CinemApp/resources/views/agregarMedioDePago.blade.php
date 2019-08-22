@extends('layouts.app')

@section('title', 'Agregar medio de pago');

@section('content')
    <div class="container">
        <form method="post" action="{{route('mediosDePago.store')}}">
            @csrf
            <div class="form-group">
                <label for="numero">Número</label>
                <input type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" id="numero"
                       placeholder="Ingresa el número de la tarjeta..." value="{{old('numero')}}">
                @error('numero')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="expiracion">Expiración</label>
                <input type="text" class="form-control @error('expiracion') is-invalid @enderror" name="expiracion"
                       id="expiracion" placeholder="Ingresa la expiración..." value="{{old('expiracion')}}">
                @error('expiracion')
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
