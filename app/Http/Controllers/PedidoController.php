<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index(){
        $pedidos = Pedido::with('produtos')->get();
        return view('pedidos', compact('pedidos'));
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
}
