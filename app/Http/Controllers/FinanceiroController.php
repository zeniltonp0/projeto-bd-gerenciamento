<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\MateriaPrima;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

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

    public function editFuncionario(Funcionario $funcionario){
        return view('edit-funcionario', compact('funcionario'));
    }

    public function updateFuncionario(Request $request, Funcionario $funcionario){

        $request->validate([
            'nome' => 'required|string|max:100',
            'diaria' => 'required|numeric',
            'dias_trabalhados' => 'required|integer',
            'salario' => 'required|numeric'
        ]);

        $funcionario->update([
            'nome' => $request->nome,
            'diaria' => $request->diaria,
            'dias_trabalhados'=> $request->dias_trabalhados,
            'salario' => $request->salario
        ]);

        return redirect()->route('financeiro.index')->with('success', 'Funcionário cadastrado com sucesso!');
        
    }

    public function destroyFuncionario(Funcionario $funcionario){
        $funcionario->delete();
        return redirect()->route('financeiro.index')->with('success', 'Funcionário deletado com sucesso!');
        
    }

    public function editMateriaPrima(Request $request, MateriaPrima $materiaPrima){
        return view('edit-materiaprima', compact('materiaPrima'));
    }

    public function updateMateriaPrima(Request $request, MateriaPrima $materiaPrima){

        $request->validate([
            'nome' => 'required|string|max:100',
            'quantidade' => 'required|integer',
            'valor' => 'required|numeric',
            'data' => 'required|date'
        ]);

        $materiaPrima->update([
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'valor' => $request->valor,
            'data' => $request->data
        ]);

        return redirect()->route('financeiro.index')->with('success', 'Matéria-Prima atualizada com sucesso!');
    }

    public function destroyMateriaPrima(MateriaPrima $materiaPrima){
        $materiaPrima->delete();
        return redirect()->route('financeiro.index')->with('success', 'Funcionário deletado com sucesso!');

    }
}
