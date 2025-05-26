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

    public function edit(Request $request, Produto $produto){
        return view('edit-produto', compact('produto'));
    }

    public function update(Request $request, Produto $produto){
        $request->validate([
            'nome' => 'required|string|max:50',
            'descricao' => 'required|string|max:50',
            'preco' => 'required|numeric'
        ]);

        $produto->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco
        ]);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto){
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto deletado com sucesso!');
    }
}