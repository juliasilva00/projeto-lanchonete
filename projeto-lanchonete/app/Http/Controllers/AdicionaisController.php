<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Http\Requests\AdicionalFormRequest;

class AdicionaisController extends Controller
{
    ################ referentes a adicionais ####################

    // mostra o formulário
    public function adicionarAdicional(Request $request)
    {
        $categoria = Produto::query()
            ->with('Categoria')
            ->where('idCat', '1')
            ->get();

        return view('lanchonete.adicionar_adicional', compact('categoria'));
    }

    // salva os dados no BD - via form
    public function storeAdicional(AdicionalFormRequest $request)
    {
        $adicional = Produto::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "{$adicional->id} - {$adicional->descricao} adicionado com sucesso" //???
            );

        $categorias = Categoria::query()
            ->where('categoria', 'adicional')
            ->get();

        return redirect()->route('listar_adicionais');
    }

    // modal
    public function storeAdicionalModal(AdicionalFormRequest $request)
    {
        $adicional = Produto::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "{$adicional->id} - {$adicional->descricao} adicionado com sucesso" 
            );

        return redirect()->route('index');
    }

    // página inicial
    public function listarAdicionais(Request $request)
    {
        $adicionais = Produto::query()
            ->with('Categoria')
            ->where('idCat', '1')
            ->get();

        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');

        return view('lanchonete.listar_adicionais', compact('adicionais', 'mensagem'));
    }

    // editar
    public function editarAdicional(Request $request)
    {
        $adicional = Produto::find($request->id);

        return view('lanchonete.adicionar_adicional',compact('adicional'));
    }

    public function updateAdicional(AdicionalFormRequest $request, $id)
    {
        $adicional = Produto::where(['id'=>$id])->update([
            'descricao'=>$request->descricao,
            'preco'=>$request->preco
        ]);
        $request->session()
            ->flash(
                'mensagem',
                "{$id} - {$request->descricao} editado com sucesso" 
            );

        return redirect()->route('listar_adicionais');
    }

    // deletar
    public function destroyAdicional(Request $request)
    {
        Produto::destroy($request->id);

        $request->session()
            ->flash(
                'mensagem',
                "{$request->id} - {$request->descricao}  removido com sucesso"
            );

        return redirect()->route('listar_adicionais');
    }
}
