@extends('layout')

@section('titulo')
@if(isset($bebida))
Editar Bebida
@else
Cadastrar Bebida
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
    @if(isset($bebida)) 
    <form class="form-container" name="formEdicao" id="formEdicao" method="post" action="/lanchonete/listarbebidas/{{ $bebida->id }}/edit">
        @method('PUT')
        <h2 style="text-align: center">Editar Bebida</h2>
    @else
    <form class="form-container" name="formEdicao" id="formEdicao" method="post">
        <h2 style="text-align: center">Nova Bebida</h2>
    @endif
        @csrf
        <div class="form-group">
            <label for="">Código</label>
                <input type="number" class="form-control" name="id" id="id" disabled value="{{$bebida->id ?? ''}}"> 
            </div>
        <div class="form-group">
            <label for="">Categoria</label>
            <input type="number" class="form-control" name="idCat" id="idCat" value="{{$bebida->idCat ?? ''}}"> 
        </div>
        <div class="form-group">
            <label for="">Descrição</label>
            <input type="text" class="form-control" name="descricao" id="descricao" value="{{$bebida->descricao ?? ''}}">
        </div>
        <div class="form-group">
            <label for="">Preço</label>
            <input type="double" class="form-control" name="preco" id="preco" value="{{$bebida->preco ?? ''}}">
        </div>
        <button type="submit" class="btn btn-primary">
            @if(isset($bebida))
            Editar
            @else
            Cadastrar
            @endif
        </button>
    </form>
</div>
@endsection
