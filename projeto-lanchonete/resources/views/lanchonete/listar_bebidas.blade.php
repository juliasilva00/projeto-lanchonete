@extends('layout')

@section('titulopagina')
Lista de Bebidas
@endsection

@section('conteudo')
<div class="main ">
    <div class="table-container">
        <h2 style="text-align: center">Bebidas</h2>
        <a href="{{route('form_adicionar_bebida')}}" class="btn btn-primary " role="button" aria-pressed="true">Adicionar</a>
        <a href="{{route('index')}}" class="btn btn-secondary " role="button" aria-pressed="true">Voltar</a>

        @if (!empty($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
        @endif
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bebidas as $bebida)
                <tr>
                    <th scope="row">{{ $bebida->id }}</th>
                    <td>{{ $bebida->descricao }}</td>
                    <td>R$ {{ $bebida->preco }}</td>
                    <td class="btn-group" role="group">
                        <a href="/lanchonete/listarbebidas/{{ $bebida->id }}/edit" class="btn btn-primary " role="button" aria-pressed="true">Editar</a>
                        <form method="post" action="/lanchonete/listarbebidas/{{ $bebida->id }}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($bebida->descricao) }}?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-space" role="button" aria-pressed="true">Excluir</a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection