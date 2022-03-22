<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Categoria;

class LanchoneteController extends Controller
{
    public function index(Request $request)
    {
        // ver como faz para adicionar todos os dados de BD na index
        $clientes = Cliente::query()
            ->orderBy('id')
            ->get();

        // seleciona apenas lanches
        $lanches = Produto::query()
            ->orderBy('descricao')
            ->with('Categoria')
            ->where('idCat', '3')
            ->get();

        // seleciona apenas bebidas
        $bebidas = Produto::query()
            ->orderBy('id')
            ->with('Categoria')
            ->where('idCat', '2')
            ->get();

        // seleciona apenas adicionais
        $adicionais = Produto::query()
            ->orderBy('id')
            ->with('Categoria')
            ->where('idCat', '1')
            ->get();

        // ARRUMAR MENSAGEM
        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');

    return view('lanchonete.index', compact('clientes', 'lanches', 'bebidas', 'adicionais', 'mensagem'));
    }

    

    }
