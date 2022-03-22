@extends('layout')

@section('titulopagina')
Lista de Clientes
@endsection

@section('conteudo')
<div class="main ">
    <div class="table-container">
        <h2 style="text-align: center">Clientes</h2>
        <a href="{{route('adicionar_cliente')}}" class="btn btn-primary " role="button" aria-pressed="true">Adicionar</a>
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
                    <th scope="col">Nome</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <th scope="row">{{ $cliente->id }}</th>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->endereco }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td class="btn-group" role="group">
                        <a href="/lanchonete/listarclientes/{{ $cliente->id }}/edit" class="btn btn-primary " role="button" aria-pressed="true">Editar</a>

                        <form method="post" action="/lanchonete/listarclientes/{{ $cliente->id }}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($cliente->nome) }}?')">
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