<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $pedidos = Pedido::with('produtos')->get();
        return view('dashboard', compact('pedidos'));
    }
}
