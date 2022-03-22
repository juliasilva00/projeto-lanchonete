<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Http\Requests\LancheFormRequest;

class LanchesController extends Controller 
{
    ################ referentes a lanches ####################
    // mostra o formulário
    public function adicionarLanche(Request $request)
    {
        $categoria = Produto::query()
            ->with('Categoria')
            ->where('idCat', '3')
            ->get();

        return view('lanchonete.adicionar_lanche', compact('categoria'));
    }

    // salva os dados no BD - via form
    public function storeLanche(LancheFormRequest $request)
    {
        $lanche = Produto::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "{$lanche->id} - {$lanche->descricao} adicionado com sucesso"
            );

        $categorias = Categoria::query()
            ->where('categoria', 'Lanche')
            ->get();

        return redirect()->route('listar_lanches');
    }

    // modal 
    public function storeLancheModal(lancheFormRequest $request)
    {
        $lanche = Produto::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "{$lanche->id} - {$lanche->descricao} adicionado com sucesso"
            );

        return redirect()->route('index');
    }

    // página inicial
    public function listarLanches(Request $request)
    {
        $lanches = Produto::query()
            ->with('Categoria')
            ->where('idCat', '3')
            ->get();

        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');

        return view('lanchonete.listar_lanches', compact('lanches', 'mensagem'));
    }

    // editar 
    public function editarLanche(Request $request)
    {
        $lanche = Produto::find($request->id);

        return view('lanchonete.adicionar_lanche', compact('lanche'));
    }

    public function updateLanche(LancheFormRequest $request, $id)
    {
        $lanche = Produto::where(['id' => $id])->update([
            'descricao' => $request->descricao,
            'preco' => $request->preco
        ]);
        $request->session()
            ->flash(
                'mensagem',
                "{$id} - {$request->descricao} editado com sucesso"
            );

        return redirect()->route('listar_lanches');
    }

    // deletar
    public function destroyLanche(Request $request)
    {
        Produto::destroy($request->id);

        $request->session()
            ->flash(
                'mensagem',
                "{$request->id} - {$request->descricao} removido com sucesso"
            );

        return redirect()->route('listar_lanches');
    }
}
