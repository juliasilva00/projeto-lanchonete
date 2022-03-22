<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Http\Requests\ClienteFormRequest;

class ClientesController extends Controller
{
    ################ referentes a clientes ####################

    // mostra o formulário
    public function adicionarCliente(Request $request)
    {
        return view('lanchonete.adicionar_cliente');
    }

    // salva os dados no BD - via form
    public function storeCliente(ClienteFormRequest $request)
    {
        $cliente = Cliente::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "{$cliente->id} - {$cliente->nome} adicionado com sucesso"
            );

        return redirect()->route('listar_clientes');
    }

    // modal
    public function storeClienteModal(ClienteFormRequest $request)
    { 
        $cliente = Cliente::create($request->all()); 
        $request->session()
            ->flash(
                'mensagem',
                "{$cliente->id} - {$cliente->nome} adicionado com sucesso"
            );

        return redirect()->route('index');
    }

    // página inicial
    public function listarClientes(Request $request)
    {
        $clientes = Cliente::query()
            ->orderBy('id')
            ->get();
        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');

        return view('lanchonete.listar_clientes', compact('clientes', 'mensagem'));
    }

    // editar 
    public function editarCliente(Request $request)
    {
        $cliente = Cliente::find($request->id);

        return view('lanchonete.adicionar_cliente', compact('cliente'));
    }

    public function updateCliente(ClienteFormRequest $request, $id)
    {
        $cliente = Cliente::where(['id' => $id])->update([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone
        ]);
        $request->session()
            ->flash(
                'mensagem',
                "{$id} - {$request->nome} editado com sucesso"
            );

        return redirect()->route('listar_clientes');
    }

    // deletar 
    public function destroyCliente(Request $request)
    {
        Cliente::destroy($request->id);

        $request->session()
            ->flash(
                'mensagem',
                "{$request->nome} removido com sucesso"
            );

        return redirect()->route('listar_clientes');
    }
}
