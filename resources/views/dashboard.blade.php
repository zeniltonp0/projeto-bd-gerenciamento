@extends('layouts.navbar') 

@section('content')
    
    <div class="container bg-white py-12 px-6 rounded-xl shadow-lg mx-auto my-8 max-w-7xl">
        

        <h2 class="text-4xl font-bold text-slate-700 mb-8 text-center">RELATÓRIO DIÁRIO</h2> 

        <div class="flex flex-col lg:flex-row lg:space-x-8 space-y-8 lg:space-y-0">
            
            <div class="flex-1 bg-white p-6 rounded-xl shadow-md border border-gray-200">
                
                <h3 class="text-2xl font-bold text-white mb-8 flex items-center bg-cyan-800 rounded-full py-3 px-6 justify-between">
                    EMPADAS FEITAS HOJE :
                    <span class="ml-4 bg-white p-2 rounded-full font-semibold text-gray-800 border border-gray-300 min-w-[70px] text-center">100</span>
                </h3>

                <div class="mb-8"> 
                    <h4 class="text-xl font-semibold text-gray-700 mb-4">EMPADAS FEITAS POR SEMANA</h4>
                    <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4">
                        <div class="bg-slate-300 rounded-full py-2 px-4 flex items-center space-x-2 w-full sm:w-1/2">
                            <label for="feito_inicio" class="text-gray-800 font-semibold">INICIO :</label>
                            <input type="date" id="feito_inicio" class="form-input block rounded-full border-none bg-white p-1 text-base flex-1">
                        </div>
                        <div class="bg-slate-300 rounded-full py-2 px-4 flex items-center space-x-2 w-full sm:w-1/2">
                            <label for="feito_fim" class="text-gray-800 font-semibold">FIM :</label>
                            <input type="date" id="feito_fim" class="form-input block rounded-full border-none bg-white p-1 text-base flex-1">
                        </div>
                    </div>
                </div>

                
                <div class="rounded-lg shadow-md overflow-hidden mt-8"> 
                    <table class="min-w-full">
                        <thead class="bg-cyan-800">
                            <tr>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">DATA</th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">QUANTIDADE</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($pedidos as $pedido)
                                <tr>
                                    <td class="p-2">
                                        <div class="bg-slate-200 border border-slate-200 rounded-md p-3 text-sm text-gray-900 shadow-sm">{{ $pedido->data }}</div>
                                    </td>
                                    <td class="p-2">
                                        <div class="bg-slate-200 border border-slate-200 rounded-md p-3 text-sm text-gray-900 shadow-sm">{{ $pedido->quantidade }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            
            <div class="flex-1 bg-white p-6 rounded-xl shadow-md border border-gray-200">
                
                <h3 class="text-2xl font-bold text-white mb-8 flex items-center bg-rose-800 rounded-full py-3 px-6 justify-between">
                    EMPADAS VENDIDAS HOJE :
                    <span class="ml-4 bg-white p-2 rounded-full font-semibold text-gray-800 border border-gray-300 min-w-[70px] text-center">100</span>
                </h3>

                <div class="mb-8"> 
                    <h4 class="text-xl font-semibold text-gray-700 mb-4">EMPADAS VENDIDAS POR SEMANA</h4>
                    <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4">
                        
                        <div class="bg-rose-300 rounded-full py-2 px-4 flex items-center space-x-2 w-full sm:w-1/2">
                            <label for="vendido_inicio" class="text-gray-800 font-semibold">INICIO :</label>
                            <input type="date" id="vendido_inicio" class="form-input block rounded-full border-none bg-white p-1 text-base flex-1">
                        </div>
                        <div class="bg-rose-300 rounded-full py-2 px-4 flex items-center space-x-2 w-full sm:w-1/2">
                            <label for="vendido_fim" class="text-gray-800 font-semibold">FIM :</label>
                            <input type="date" id="vendido_fim" class="form-input block rounded-full border-none bg-white p-1 text-base flex-1">
                        </div>
                    </div>
                </div>

                
                <div class="rounded-lg shadow-md overflow-hidden mt-8"> 
                    <table class="min-w-full">
                        <thead class="bg-rose-800">
                            <tr>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">DATA</th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">QUANTIDADE</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($pedidos as $pedido)
                                <tr>
                                    <td class="p-2">
                                        <div class="bg-rose-100 border border-rose-100 rounded-md p-3 text-sm text-gray-900 shadow-sm">{{ $pedido->data }}</div>
                                    </td>
                                    <td class="p-2">
                                        <div class="bg-rose-100 border border-rose-200 rounded-md p-3 text-sm text-gray-900 shadow-sm">{{ $pedido->quantidade }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection