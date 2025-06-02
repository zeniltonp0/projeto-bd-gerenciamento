<?php

namespace App\Http\Controllers;

use App\Models\Pedido; 
use Illuminate\Http\Request;
use Carbon\Carbon; 

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // ----------------------------------------------------
        // CALCULO PARA EMPADAS FEITAS HOJE (VALORES FIXOS PARA HOJE)
        // ----------------------------------------------------
        $hoje = Carbon::today()->toDateString(); 
        
        $pedidosFeitasHoje = Pedido::where('status', 'Feito')
                                   ->where('data', $hoje)
                                   ->get();

        $empadasFeitasHoje = $pedidosFeitasHoje->sum(function ($pedido) {
            return (int) trim($pedido->quantidade); 
        });

        // ----------------------------------------------------
        // CALCULO PARA EMPADAS VENDIDAS HOJE (VALORES FIXOS PARA HOJE)
        // ----------------------------------------------------
        $pedidosVendidasHoje = Pedido::where('status', 'Pago')
                                     ->where('data', $hoje)
                                     ->get();

        $empadasVendidasHoje = $pedidosVendidasHoje->sum(function ($pedido) {
            return (int) trim($pedido->quantidade);
        });

        // ----------------------------------------------------
        // LÓGICA DE BUSCA PARA "EMPADAS FEITAS"
        // ----------------------------------------------------
        // Define as datas de início e fim da busca para "Feito".
        // Se os parâmetros 'feito_inicio' não existirem, usa o de 'vendido_inicio' ou hoje.
        $dataInicioFeito = $request->input('feito_inicio')
                           ?: $request->input('vendido_inicio', Carbon::today()->toDateString());
        // Se os parâmetros 'feito_fim' não existirem, usa o de 'vendido_fim' ou hoje.
        $dataFimFeito = $request->input('feito_fim')
                         ?: $request->input('vendido_fim', Carbon::today()->toDateString());
        
        // **AQUI ESTÁ A MUDANÇA PRINCIPAL:** Passamos as strings de data diretamente.
        // O Jenssegers se encarregará da conversão conforme o tipo do campo 'data' no seu MongoDB.
        $pedidosFeitosBuscados = Pedido::where('status', 'Feito')
                                       ->whereBetween('data', [$dataInicioFeito, $dataFimFeito])
                                       ->get();

        // ----------------------------------------------------
        // LÓGICA DE BUSCA PARA "EMPADAS VENDIDAS"
        // ----------------------------------------------------
        // Define as datas de início e fim da busca para "Vendido".
        $dataInicioVendido = $request->input('vendido_inicio')
                             ?: $request->input('feito_inicio', Carbon::today()->toDateString());
        $dataFimVendido = $request->input('vendido_fim')
                           ?: $request->input('feito_fim', Carbon::today()->toDateString());

        // **AQUI ESTÁ A MUDANÇA PRINCIPAL:** Passamos as strings de data diretamente.
        $pedidosVendidosBuscados = Pedido::where('status', 'Pago')
                                         ->whereBetween('data', [$dataInicioVendido, $dataFimVendido])
                                         ->get();
        
        // Retorna a view com todos os dados
        return view('dashboard', compact(
            'empadasFeitasHoje',
            'empadasVendidasHoje',
            'pedidosFeitosBuscados',
            'pedidosVendidosBuscados',
            'dataInicioFeito',    // Manter o valor no input "Feito"
            'dataFimFeito',       // Manter o valor no input "Feito"
            'dataInicioVendido',  // Manter o valor no input "Vendido"
            'dataFimVendido'      // Manter o valor no input "Vendido"
        ));
    }
}