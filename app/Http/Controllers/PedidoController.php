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
}
