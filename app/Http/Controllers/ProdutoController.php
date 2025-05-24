<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(){
        $produtos = Produto::with('pedidos')->get();
        return view('produtos', compact('produtos'));
    }
}
