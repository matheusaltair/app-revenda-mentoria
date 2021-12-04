@extends('layouts.app')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Revenda de veículos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('revenda.create') }}"> Adicionar veículo</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Ano</th>
            <th>valor</th>
            <th width="300px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $value->marca }}</td>
            <td>{{ $value->modelo }}</td>
            <td>{{ $value->ano }}</td>
            <td>R$ {{ $value->valor }}</td>
            <td>
                <form action="{{ route('revenda.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('revenda.show',$value->id) }}">Mostrar</a>    
                    <a class="btn btn-primary" href="{{ route('revenda.edit',$value->id) }}">Editar</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>   
@endsection