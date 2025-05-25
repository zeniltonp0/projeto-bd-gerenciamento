<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\MateriaPrima;
use Illuminate\Http\Request;

class FinanceiroController extends Controller
{
    public function index(){
        $funcionarios = Funcionario::all();
        $materiasPrima = MateriaPrima::all();
        return view('financeiro', compact(['funcionarios', 'materiasPrima']));
    }

    public function store(Request $request){
        $request->validate([
            'nome' => 'required|string|max:100',
            'diaria' => 'required|numeric',
            'dias_trabalhados' => 'required|integer',
            'salario' => 'required|numeric'
        ]);

        Funcionario::create([
            'nome' => $request->nome,
            'diaria' => $request->diaria,
            'dias_trabalhados'=> $request->dias_trabalhados,
            'salario' => $request->salario
        ]);

        return redirect()->route('financeiro.index');
    }

    public function storeMp(Request $request){
        $request->validate([
            'nome' => 'required|string|max:100',
            'quantidade' => 'required|integer',
            'valor' => 'required|numeric',
            'data' => 'required|date',
        ]);

        MateriaPrima::create([
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'valor'=> $request->valor,
            'data' => $request->data
        ]);

        return redirect()->route('financeiro.index');
    }
}
