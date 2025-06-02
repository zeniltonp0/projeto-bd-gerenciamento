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

        $custoRealMp = $materiasPrima->sum('valor');
            
        return view('financeiro', compact(['funcionarios', 'materiasPrima', 'custoRealMp']));
    }

    public function store(Request $request){
        // Valida os dados da requisição
        $request->validate([
            'nome' => 'required|string|max:100',
            'diaria' => 'required|numeric',
            'dias_trabalhados' => 'required|integer',
            // 'salario' foi removido da validação, pois será calculado
        ]);

        // Calcula o salário com base na 'diaria' e 'dias_trabalhados'
        $diaria = $request->input('diaria');
        $diasTrabalhados = $request->input('dias_trabalhados');
        $salarioCalculado = $diaria * $diasTrabalhados;

        // Cria um novo registro de Funcionario com o salário calculado
        Funcionario::create([
            'nome' => $request->nome,
            'diaria' => $diaria,
            'dias_trabalhados'=> $diasTrabalhados,
            'salario' => $salarioCalculado // Armazena o salário calculado
        ]);

        return redirect()->route('financeiro.index')->with('success', 'Funcionário cadastrado com sucesso!');
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

        return redirect()->route('financeiro.index')->with('success', 'Matéria-Prima cadastrada com sucesso!');
    }

    public function editFuncionario(Funcionario $funcionario){
        return view('edit-funcionario', compact('funcionario'));
    }

    public function updateFuncionario(Request $request, Funcionario $funcionario){

        // Valida os dados da requisição para atualização
        $request->validate([
            'nome' => 'required|string|max:100',
            'diaria' => 'required|numeric',
            'dias_trabalhados' => 'required|integer',
            // 'salario' foi removido da validação, pois será calculado
        ]);

        // Calcula o salário com base na 'diaria' e 'dias_trabalhados' para atualização
        $diaria = $request->input('diaria');
        $diasTrabalhados = $request->input('dias_trabalhados');
        $salarioCalculado = $diaria * $diasTrabalhados;

        // Atualiza o registro do Funcionario com o salário calculado
        $funcionario->update([
            'nome' => $request->nome,
            'diaria' => $diaria,
            'dias_trabalhados'=> $diasTrabalhados,
            'salario' => $salarioCalculado // Atualiza com o salário calculado
        ]);

        return redirect()->route('financeiro.index')->with('success', 'Funcionário atualizado com sucesso!');
        
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
        return redirect()->route('financeiro.index')->with('success', 'Matéria-Prima deletada com sucesso!');

    }
}