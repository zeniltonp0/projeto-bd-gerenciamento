<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(){
        $produtos = Produto::with('pedidos')->get();
        return view('produtos', compact('produtos'));
    }

    public function store(Request $request){
        $request->validate([
            'nome' => 'required|string|max:50',
            'descricao' => 'required|string|max:50',
            'preco' => 'required|numeric'
        ]);

        Produto::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco
        ]);

        return redirect()->route('produtos.index');
    }
}
