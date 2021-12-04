@extends('layouts.app')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Produto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('revenda.index') }}"> Voltar</a>
            </div>
        </div>
    </div>
   
    @include('includes.alerts')
  
    <form action="{{ route('revenda.update',$revenda->id) }}" method="POST">
        @csrf
        @method('PUT')
   
        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Marca</strong>
                <input type="text" name="marca" class="form-control" placeholder="Marca do carro" value="{{$revenda->marca}}">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Modelo</strong>
                <input type="text" name="modelo" class="form-control" placeholder="Modelo do carro"value="{{$revenda->modelo}}">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>ano</strong>
                <input type="number" min="1950" max="2099" step="1"name="ano" class="form-control" placeholder="Ano do carro" value="{{$revenda->ano}}">
             
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Valor</strong>
                <input type="number" name="valor" class="form-control" placeholder="Valor do carro"
                value="{{$revenda->valor}}">>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
   
    </form>
@endsection