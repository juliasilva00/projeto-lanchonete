@extends('layout')

@section('titulo')
@if(isset($adicional))
Editar Adicional
@else
Cadastrar Adicional
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
    @if(isset($adicional)) 
    <form class="form-container" name="formEdicao" id="formEdicao" method="post" action="/lanchonete/listaradicionais/{{ $adicional->id }}/edit">
        @method('PUT')
        <h2 style="text-align: center">Editar Adicional</h2>
    @else
    <form class="form-container" name="formCadastro" id="formCadastro"  method="post">
        <h2 style="text-align: center">Novo Adicional</h2>
    @endif
        @csrf
        <div class="form-group">
            <label for="">Código</label>
                <input type="number" class="form-control" name="id" id="id" disabled value="{{$adicional->id ?? ''}}"> 
            </div>
        <div class="form-group">
            <label for="">Categoria</label>
            <input type="number" class="form-control" name="idCat" id="idCat" value="{{$adicional->idCat ?? ''}}"> 
        </div>
        <div class="form-group">
            <label for="">Descrição</label>
            <input type="text" class="form-control" name="descricao" id="descricao" value="{{$adicional->descricao ?? ''}}">
        </div>
        <div class="form-group">
            <label for="">Preço</label>
            <input type="double" class="form-control" name="preco" id="preco" value="{{$adicional->preco ?? ''}}">
        </div>
        <button type="submit" class="btn btn-primary">
            @if(isset($adicional))
            Editar
            @else
            Cadastrar
            @endif
        </button>
    </form>
</div>
@endsection
