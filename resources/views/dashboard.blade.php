@extends('layouts.navbar') 

@section('content')
    
    <div class="container bg-white py-12 px-6 rounded-xl shadow-lg mx-auto my-8 max-w-7xl">
        

        <h2 class="text-4xl font-bold text-slate-700 mb-8 text-center">RELATÓRIO DIÁRIO</h2> 

        <div class="flex flex-col lg:flex-row lg:space-x-8 space-y-8 lg:space-y-0">
            
            <div class="flex-1 bg-white p-6 rounded-xl shadow-md border border-gray-200">
                
                <h3 class="text-2xl font-bold text-white mb-8 flex items-center bg-cyan-800 rounded-full py-3 px-6 justify-between">
                    EMPADAS FEITAS HOJE :
                    <span class="ml-4 bg-white p-2 rounded-full font-semibold text-gray-800 border border-gray-300 min-w-[70px] text-center">
                        {{ $empadasFeitasHoje }} {{-- Esta variável virá do DashboardController --}}
                    </span>
                </h3>

                <div class="mb-8"> 
                    <h4 class="text-xl font-semibold text-gray-700 mb-4">BUSCAR EMPADAS FEITAS</h4>
                    {{-- Formulário de busca para Empadas Feitas --}}
                    <form action="{{ route('dashboard.index') }}" method="GET"> {{-- Ação aponta para a rota do dashboard --}}
                        <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4">
                            <div class="bg-slate-300 rounded-full py-2 px-4 flex items-center space-x-2 w-full sm:w-1/2">
                                <label for="feito_inicio" class="text-gray-800 font-semibold">INÍCIO:</label>
                                <input type="date" name="feito_inicio" id="feito_inicio"
                                       class="form-input block rounded-full border-none bg-white p-1 text-base flex-1"
                                       value="{{ request('feito_inicio', $dataInicioFeito ?? '') }}">
                            </div>
                            <div class="bg-slate-300 rounded-full py-2 px-4 flex items-center space-x-2 w-full sm:w-1/2">
                                <label for="feito_fim" class="text-gray-800 font-semibold">FIM:</label>
                                <input type="date" name="feito_fim" id="feito_fim"
                                       class="form-input block rounded-full border-none bg-white p-1 text-base flex-1"
                                       value="{{ request('feito_fim', $dataFimFeito ?? '') }}">
                            </div>
                            <button type="submit" class="bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded-full shadow-md transition duration-300 ease-in-out">
                                Buscar
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Tabela de resultados da busca de Empadas Feitas --}}
                <div class="rounded-lg shadow-md overflow-hidden mt-8"> 
                    <table class="min-w-full">
                        <thead class="bg-cyan-800">
                            <tr>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">DATA</th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">QUANTIDADE</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse ($pedidosFeitosBuscados as $pedido) {{-- Esta variável virá do DashboardController --}}
                                <tr>
                                    <td class="p-2">
                                        <div class="bg-slate-200 border border-slate-200 rounded-md p-3 text-sm text-gray-900 shadow-sm">{{ \Carbon\Carbon::parse($pedido->data)->format('d/m/Y') }}</div>
                                    </td>
                                    <td class="p-2">
                                        <div class="bg-slate-200 border border-slate-200 rounded-md p-3 text-sm text-gray-900 shadow-sm">{{ $pedido->quantidade }}</div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="p-4 text-center text-gray-500">Nenhum resultado encontrado para o período.</td>
                                </tr>
                            @endforelse
                            @if($pedidosFeitosBuscados->isNotEmpty())
                            <tr>
                                <td class="p-2 text-right font-bold">Total:</td>
                                <td class="p-2">
                                    <div class="bg-slate-300 border border-slate-300 rounded-md p-3 text-sm text-gray-900 shadow-sm font-bold">
                                        {{ $pedidosFeitosBuscados->sum('quantidade') }}
                                    </div>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            
            <div class="flex-1 bg-white p-6 rounded-xl shadow-md border border-gray-200">
                
                <h3 class="text-2xl font-bold text-white mb-8 flex items-center bg-rose-800 rounded-full py-3 px-6 justify-between">
                    EMPADAS VENDIDAS HOJE :
                    <span class="ml-4 bg-white p-2 rounded-full font-semibold text-gray-800 border border-gray-300 min-w-[70px] text-center">
                        {{ $empadasVendidasHoje }} {{-- Esta variável virá do DashboardController --}}
                    </span>
                </h3>

                <div class="mb-8"> 
                    <h4 class="text-xl font-semibold text-gray-700 mb-4">BUSCAR EMPADAS VENDIDAS</h4>
                    {{-- Formulário de busca para Empadas Vendidas --}}
                    <form action="{{ route('dashboard.index') }}" method="GET"> {{-- Ação aponta para a rota do dashboard --}}
                        <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4">
                            
                            <div class="bg-rose-300 rounded-full py-2 px-4 flex items-center space-x-2 w-full sm:w-1/2">
                                <label for="vendido_inicio" class="text-gray-800 font-semibold">INÍCIO:</label>
                                <input type="date" name="vendido_inicio" id="vendido_inicio"
                                       class="form-input block rounded-full border-none bg-white p-1 text-base flex-1"
                                       value="{{ request('vendido_inicio', $dataInicioVendido ?? '') }}">
                            </div>
                            <div class="bg-rose-300 rounded-full py-2 px-4 flex items-center space-x-2 w-full sm:w-1/2">
                                <label for="vendido_fim" class="text-gray-800 font-semibold">FIM:</label>
                                <input type="date" name="vendido_fim" id="vendido_fim"
                                       class="form-input block rounded-full border-none bg-white p-1 text-base flex-1"
                                       value="{{ request('vendido_fim', $dataFimVendido ?? '') }}">
                            </div>
                            <button type="submit" class="bg-rose-600 hover:bg-rose-700 text-white font-bold py-2 px-4 rounded-full shadow-md transition duration-300 ease-in-out">
                                Buscar
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Tabela de resultados da busca de Empadas Vendidas --}}
                <div class="rounded-lg shadow-md overflow-hidden mt-8"> 
                    <table class="min-w-full">
                        <thead class="bg-rose-800">
                            <tr>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">DATA</th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">QUANTIDADE</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse ($pedidosVendidosBuscados as $pedido) {{-- Esta variável virá do DashboardController --}}
                                <tr>
                                    <td class="p-2">
                                        <div class="bg-rose-100 border border-rose-100 rounded-md p-3 text-sm text-gray-900 shadow-sm">{{ \Carbon\Carbon::parse($pedido->data)->format('d/m/Y') }}</div>
                                    </td>
                                    <td class="p-2">
                                        <div class="bg-rose-100 border border-rose-200 rounded-md p-3 text-sm text-gray-900 shadow-sm">{{ $pedido->quantidade }}</div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="p-4 text-center text-gray-500">Nenhum resultado encontrado para o período.</td>
                                </tr>
                            @endforelse
                            @if($pedidosVendidosBuscados->isNotEmpty())
                            <tr>
                                <td class="p-2 text-right font-bold">Total:</td>
                                <td class="p-2">
                                    <div class="bg-rose-200 border border-rose-200 rounded-md p-3 text-sm text-gray-900 shadow-sm font-bold">
                                        {{ $pedidosVendidosBuscados->sum('quantidade') }}
                                    </div>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection