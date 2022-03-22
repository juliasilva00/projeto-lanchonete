@extends('layout')

@section('titulo')
@if(isset($cliente))
Editar Cliente
@else
Cadastrar Cliente
@endif
@endsection

@section('conteudo')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="main">
    @if(isset($cliente)) 
    <form class="form-container" name="formEdicao" id="formEdicao" method="post" action="/lanchonete/listarclientes/{{ $cliente->id }}/edit">
        @method('PUT')
        <h2 style="text-align: center">Editar Cliente</h2>
    @else
    <form class="form-container" name="formEdicao" id="formEdicao" method="post">
        <h2 style="text-align: center">Novo Cliente</h2>
    @endif
        @csrf
        <div class="form-group">
            <label for="">Código</label>
            <input type="number" class="form-control" name="id" id="id" disabled value="{{$cliente->id ?? ''}}"> 
        </div>
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{$cliente->nome ?? ''}}">
        </div>
        <div class="form-group">
            <label for="">Endereço</label>
            <input type="text" class="form-control" name="endereco" id="endereco" value="{{$cliente->endereco ?? ''}}">
        </div>
        <div class="form-group">
            <label for="">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="telefone" value="{{$cliente->telefone ?? ''}}">
        </div>
        <button type="submit" class="btn btn-primary">
            @if(isset($cliente))
            Editar
            @else
            Cadastrar
            @endif
        </button>
    </form>
</div>
@endsection
