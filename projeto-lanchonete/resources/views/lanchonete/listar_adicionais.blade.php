@extends('layout')

@section('titulopagina')
Lista de Adicionais
@endsection

@section('conteudo')
<div class="main ">
    <div class="table-container">
        <h2 style="text-align: center">Adicionais</h2>
        <a href="{{route('form_adicionar_adicional')}}" class="btn btn-primary " role="button" aria-pressed="true">Adicionar</a>
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
                @foreach ($adicionais as $adicional)
                <tr>
                    <th scope="row">{{ $adicional->id }}</th>
                    <td>{{ $adicional->descricao }}</td>
                    <td>R$ {{ $adicional->preco }}</td>
                    <td class="btn-group" role="group">
                        <a href="/lanchonete/listaradicionais/{{ $adicional->id }}/edit" class="btn btn-primary " role="button" aria-pressed="true">Editar</a>
                        <form method="post" action="/lanchonete/listaradicionais/{{ $adicional->id }}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($adicional->descricao) }}?')">
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