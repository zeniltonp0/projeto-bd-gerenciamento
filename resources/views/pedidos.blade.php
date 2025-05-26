@extends('layouts.navbar')

@section('content')
    <div class="container bg-white p-6 rounded-xl shadow-lg mx-auto my-8">
        {{-- Container principal da página de pedidos. Centralizado, com preenchimento (padding), cantos arredondados e sombra. --}}

        <h2 class="text-4xl font-bold text-gray-800 mb-6 text-center">PEDIDOS</h2>
        {{-- Título da página, estilizado para ser proeminente e centralizado. --}}

        <div class="overflow-x-auto rounded-lg shadow-md">
            {{-- Wrapper para a tabela, permitindo rolagem horizontal em telas menores e adicionando uma sombra. --}}
            <table class="min-w-full divide-y divide-gray-300">
                {{-- Estrutura principal da tabela com largura mínima total e divisores de linha. --}}
                <thead class="bg-white"> {{-- Cabeçalho da tabela com fundo branco para a linha de filtros, como na imagem. --}}
                    <tr>
                        {{-- Linha para os inputs de filtro/adição e o botão SALVAR, como na imagem. --}}
                        <form action="{{ route('pedidos.store') }}" method="POST" class="contents">
                            @csrf 
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <span class="block w-full rounded-md bg-white p-3 text-base text-gray-500">ID</span>
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="date" class="form-input block w-full rounded-md border-gray-300 shadow-sm bg-slate-100 p-3 text-base" name="data" placeholder="DATA">
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="text" class="form-input block w-full rounded-md border-gray-300 shadow-sm bg-slate-100 p-3 text-base" name="cliente" placeholder="CLIENTE">
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="text" class="form-input block w-full rounded-md border-gray-300 shadow-sm bg-slate-100 p-3 text-base" name="endereco" placeholder="ENDEREÇO">
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="number" class="form-input block w-full rounded-md border-gray-300 shadow-sm bg-slate-100 p-3 text-base" name="quantidade" placeholder="QUANTIDADE">
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <select class="form-select block w-full rounded-md border-gray-300 shadow-sm bg-slate-100 p-3 text-base" name="status">
                                    <option value="">STATUS</option>
                                    <option value="Feito">Feito</option>
                                    <option value="Entregue">Entregue</option>
                                    <option value="Pago">Pago</option>
                                </select>
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="text" class="form-input block w-full rounded-md border-gray-300 shadow-sm bg-slate-100 p-3 text-base" name="total" placeholder="VALOR">
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                <a href="#"></a>
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-300 ease-in-out">SALVAR</button>
                            </th>
                        </form>
                    </tr>
                    <tr class="bg-slate-400"> {{-- Cabeçalho da tabela de fato com fundo marrom escuro (stone-500). --}}
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">DATA</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">CLIENTE</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">ENDEREÇO</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">QUANTIDADE</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">STATUS</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">VALOR</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">AÇÕES</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    {{-- Corpo da tabela. --}}

                    {{-- Seção do corpo da tabela para pedidos existentes. --}}
                    @foreach ($pedidos as $pedido)
                        {{-- Loop através de cada item 'pedido' fornecido pelo backend. --}}
                        <tr class="bg-slate-100 hover:bg-slate-200 transition duration-150 ease-in-out">
                            {{-- Cada linha da tabela tem um fundo marrom muito claro (stone-100), que escurece um pouco ao passar o mouse. --}}
                            <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-900">{{ $pedido->id }}</td>
                            <td class="px-3 py-4 whitespace-nowrap">
                                {{-- Formatando a data para 'dd/mm/yyyy' --}}
                                <span class="block w-full rounded-md bg-white p-3 text-base text-gray-900">{{ \Carbon\Carbon::parse($pedido->data)->format('d/m/Y') }}</span>
                            </td>
                            <td class="px-3 py-4 whitespace-nowrap">
                                <span class="block w-full rounded-md bg-white p-3 text-base text-gray-900">{{ $pedido->cliente }}</span>
                            </td>
                            <td class="px-3 py-4 whitespace-nowrap">
                                <span class="block w-full rounded-md bg-white p-3 text-base text-gray-900">{{ $pedido->endereco }}</span>
                            </td>
                            <td class="px-3 py-4 whitespace-nowrap">
                                <span class="block w-full rounded-md bg-white p-3 text-base text-gray-900">{{ $pedido->quantidade }}</span>
                            </td>
                            <td class="px-3 py-4 whitespace-nowrap">
                                <select class="form-select block w-full rounded-md border-gray-300 shadow-sm bg-white p-3 text-base" name="status">
                                    <option value="Feito" {{ $pedido->status == 'Feito' ? 'selected' : '' }}>Feito</option>
                                    <option value="Entregue" {{ $pedido->status == 'Entregue' ? 'selected' : '' }}>Entregue</option>
                                    <option value="Pago" {{ $pedido->status == 'Pago' ? 'selected' : '' }}>Pago</option>
                                </select>
                           </td>
                            <td class="px-3 py-4 whitespace-nowrap">
                                <span class="block w-full rounded-md bg-white p-3 text-base text-gray-900">R$ {{ number_format($pedido->total, 2, ',', '.') }}</span>
                            </td>
                            <td class="px-3 py-4 whitespace-nowrap text-sm font-medium flex items-center space-x-2">
                                {{-- Ícone de caneta para edição --}}
                                <a href="{{ route('pedidos.edit', $pedido->id) }}" class="text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                {{-- Ícone de lixeira para exclusão --}}
                                <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este pedido?');" class="inline-block">
                                    @csrf         
                                    @method('DELETE') 
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition duration-300 ease-in-out bg-transparent border-none p-0 cursor-pointer">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-8 text-lg text-gray-700 flex flex-col sm:flex-row justify-between space-y-4 sm:space-y-0 p-4 bg-white rounded-lg shadow-inner">
            <p class="flex items-center">Total de empadas vendidas:
                <span class="ml-2 bg-slate-300 p-2 rounded-md font-semibold text-gray-800 border border-gray-100">150</span>
            </p>
            <p class="flex items-center">Valor arrecadado:
                <span class="ml-2 bg-slate-300 p-2 rounded-md font-semibold text-gray-800 border border-gray-100">R$ 1.500,00</span>
            </p>
        </div>
    </div>
@endsection
