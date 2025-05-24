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
}
