<?php

namespace App\Http\Controllers;

use App\Models\Pedido; 
use Illuminate\Http\Request;
use Carbon\Carbon; 

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        
        $hoje = Carbon::today()->toDateString(); 

        $empadasFeitasHoje = Pedido::where('status', 'Feito')
                                   ->whereDate('data', $hoje)
                                   ->sum('quantidade');

        
        $empadasVendidasHoje = Pedido::where('status', 'Pago')
                                     ->whereDate('data', $hoje)
                                     ->sum('quantidade');

        
        $pedidosFeitosBuscados = collect();
        $pedidosVendidosBuscados = collect();
        $dataInicioFeito = null;
        $dataFimFeito = null;
        $dataInicioVendido = null;
        $dataFimVendido = null;

        
        if ($request->has('feito_inicio') && $request->has('feito_fim')) {
            $dataInicioFeito = $request->input('feito_inicio');
            $dataFimFeito = $request->input('feito_fim');

            $pedidosFeitosBuscados = Pedido::where('status', 'Feito')
                                           ->whereBetween('data', [$dataInicioFeito, $dataFimFeito])
                                           ->get();
        }

        
        if ($request->has('vendido_inicio') && $request->has('vendido_fim')) {
            $dataInicioVendido = $request->input('vendido_inicio');
            $dataFimVendido = $request->input('vendido_fim');

            $pedidosVendidosBuscados = Pedido::where('status', 'Pago')
                                            ->whereBetween('data', [$dataInicioVendido, $dataFimVendido])
                                            ->get();
        }
        
        
        return view('dashboard', compact(
            'empadasFeitasHoje',
            'empadasVendidasHoje',
            'pedidosFeitosBuscados',
            'pedidosVendidosBuscados',
            'dataInicioFeito',
            'dataFimFeito',
            'dataInicioVendido',
            'dataFimVendido'
        ));
    }
}