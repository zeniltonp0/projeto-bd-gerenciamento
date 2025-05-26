<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;


class PedidoController extends Controller
{
    public function index(){
        $pedidos = Pedido::with('produtos')->get();

        $totalEmpadas = $pedidos->sum('quantidade');
        $totalArrecadado = $pedidos->sum('total');

        return view('pedidos', compact(['pedidos', 'totalEmpadas', 'totalArrecadado']));
    }

    public function store(Request $request){
        $request->validate([
            'data' => 'required|date',
            'cliente' => 'required|string|max:50',
            'endereco' => 'required|string|max:100',
            'quantidade' => 'required|integer',
            'status' => 'required|in:Feito,Entregue,Pago',
            'total' => 'required|numeric'
        ]);

        Pedido::create([
            'data' => $request->data,
            'cliente' => $request->cliente,
            'endereco' => $request->endereco,
            'quantidade' => $request->quantidade,
            'status' => $request->status,
            'total' => $request->total
        ]);

        return redirect()->route('pedidos.index');
    }

    public function edit(Pedido $pedido){
        return view('edit-pedido', compact('pedido'));
    }

    public function update(Request $request, Pedido $pedido){
        $request->validate([
            'data' => 'required|date',
            'cliente' => 'required|string|max:50',
            'endereco' => 'required|string|max:100',
            'quantidade' => 'required|integer',
            'status' => 'required|in:Feito,Entregue,Pago',
            'total' => 'required|numeric'
        ]);

        $pedido->update([
            'data' => $request->data,
            'cliente' => $request->cliente,
            'endereco' => $request->endereco,
            'quantidade' => $request->quantidade,
            'status' => $request->status,
            'total' => $request->total
        ]);

        return redirect()->route('pedidos.index')->with('success', 'Pedido atualizado com sucesso!');
    }

    public function destroy(Pedido $pedido){
        $pedido->delete();
        return redirect()->route('pedidos.index')->with('success', 'Pedido deletado com sucesso!');
    }
}
