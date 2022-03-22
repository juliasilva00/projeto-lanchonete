<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Http\Requests\BebidaFormRequest;

class BebidasController extends Controller
{
    ################ referentes a bebidas ####################

    // mostra o formulário
    public function adicionarBebida(Request $request)
    {
        $categoria = Produto::query()
            ->with('Categoria')
            ->where('idCat', '2')
            ->get();

        return view('lanchonete.adicionar_bebida', compact('categoria'));
    }

    // salva os dados no BD - via form
    public function storeBebida(BebidaFormRequest $request)
    {
        $bebida = Produto::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "{$bebida->id} - {$bebida->descricao} adicionado com sucesso"
            );

        $categorias = Categoria::query()
            ->where('categoria', 'Bebida') 
            ->get();

        return redirect()->route('listar_bebidas');
    }

    // modal
    public function storeBebidaModal(BebidaFormRequest $request)
    {
        $bebida = Produto::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "{$bebida->id} - {$bebida->descricao} - adicionado com sucesso"
            );

        return redirect()->route('index');
    }

    // página inicial
    public function listarBebidas(Request $request)
    {
        $bebidas = Produto::query()
            ->with('Categoria')
            ->where('idCat', '2')
            ->get();

        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');

        return view('lanchonete.listar_bebidas', compact('bebidas', 'mensagem'));
    }

    // editar 
    public function editarBebida(Request $request) 
    {
        $bebida = Produto::find($request->id);

        return view('lanchonete.adicionar_bebida', compact('bebida'));
    }

    public function updateBebida(BebidaFormRequest $request, $id)
    {
        $bebida = Produto::where(['id' => $id])->update([
            'descricao' => $request->descricao,
            'preco' => $request->preco
        ]);
        $request->session()
            ->flash(
                'mensagem',
                "{$id} - {$request->descricao} editado com sucesso"
            );

        return redirect()->route('listar_bebidas');
    }

    // deletar
    public function destroyBebida(Request $request)
    {
        Produto::destroy($request->id);

        $request->session()
            ->flash(
                'mensagem',
                "{$request->id} - {$request->descricao} removido com sucesso"
            );

        return redirect()->route('listar_bebidas');
    }
}
