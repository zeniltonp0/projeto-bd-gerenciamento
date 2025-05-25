@extends('layouts.navbar') {{-- Agora, financeiro.blade.php estende o seu navbar.blade.php --}}

@section('content')


    <div class="container bg-white p-6 rounded-xl shadow-lg mx-auto my-8">
        {{-- Container principal da página Financeiro. Centralizado, com preenchimento (padding), cantos arredondados e sombra. --}}
    
        <h2 class="text-4xl font-bold text-gray-800 mb-6 text-center">FINANCEIRO</h2>
        {{-- Título da página, estilizado para ser proeminente e centralizado. --}}

        {{-- Seção de Custos de Matéria Prima --}}
        <div class="flex flex-col lg:flex-row lg:space-x-4 space-y-4 lg:space-y-0 mb-8">
            {{-- Custo Esperado de Matéria Prima --}}
            <div class="flex-1 bg-slate-300 p-4 rounded-xl shadow-md border border-gray-200 flex flex-col items-center">
                <h3 class="text-xl font-bold text-gray-800 mb-4 text-center">CUSTO ESPERADO DE MATERIA PRIMA</h3>
                <input type="text" class="form-input block w-full rounded-md border border-gray-300 shadow-sm bg-white p-3 text-base text-gray-700 mb-4" placeholder="Valor Esperado" value="#">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">SALVAR</button>
            </div>

            {{-- Custo Real de Matéria Prima --}}
            <div class="flex-1 bg-slate-300 p-4 rounded-xl shadow-md border border-gray-200 flex flex-col items-center">
                <h3 class="text-xl font-bold text-gray-800 mb-4 text-center">CUSTO REAL DE MATERIA PRIMA</h3>
                <input type="text" class="form-input block w-full rounded-md border border-gray-300 shadow-sm bg-white p-3 text-base text-gray-700 mb-4" placeholder="Custo Real" value="#">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">SALVAR</button>
            </div>
        </div>

        {{-- Seção de Funcionários --}}
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 mb-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">FUNCIONÁRIOS</h3>
            <div class="overflow-x-auto rounded-lg shadow-md">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-white">
                        <tr>
                            <form action="{{ route('financeiro.store') }}" method="POST" class="contents">
                                @csrf
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                    <span class="block w-full rounded-md border border-gray-100 bg-slate-100 p-3 text-base text-gray-700">ID</span>
                                </th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                    <input type="text" class="form-input block w-full rounded-md border border-gray-100 shadow-sm bg-slate-100 p-3 text-base text-gray-700" name="nome" placeholder="NOME">
                                </th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                    <input type="text" class="form-input block w-full rounded-md border border-gray-100 shadow-sm bg-slate-100 p-3 text-base text-gray-700" name="diaria" placeholder="DIÁRIA">
                                </th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                    <input type="number" class="form-input block w-full rounded-md border border-gray-100 shadow-sm bg-slate-100 p-3 text-base text-gray-700" name="dias_trabalhados" placeholder="DIAS TRABALHADOS">
                                </th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                    <input type="text" class="form-input block w-full rounded-md border border-gray-100 shadow-sm bg-slate-100 p-3 text-base text-gray-700" name="salario" placeholder="SALÁRIO PAGO">
                                </th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    <a href="#"></a>
                                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-300 ease-in-out">SALVAR</button>
                                </th>
                            </form>
                        </tr>
                        <tr class="bg-slate-400"> 
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">ID</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">NOME</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">DIÁRIA</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">DIAS TRABALHADOS</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">SALÁRIO PAGO</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody class="bg-slate-200 divide-y divide-slate-100">
                        @foreach ($funcionarios as $funcionario)
                            <tr>
                                <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-900">{{ $funcionario->id }}</td>
                                <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-900">{{ $funcionario->nome }}</td>
                                <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-900">R$ {{ number_format($funcionario->diaria, 2, ',', '.') }}</td>
                                <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-900">{{ $funcionario->dias_trabalhados }}</td>
                                <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-900">R$ {{ number_format($funcionario->salario, 2, ',', '.') }}</td>
                                <td class="px-3 py-4 whitespace-nowrap text-sm font-medium flex items-center space-x-2">
                                    {{-- Ícone de caneta para edição --}}
                                    <a href="{{ route('financeiro.funcionarios.edit', $funcionario->id) }}" class="text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    {{-- Ícone de lixeira para exclusão --}}
                                    <form action="{{ route('financeiro.funcionarios.destroy', $funcionario->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este funcionário?');" class="inline-block">
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
        </div>

        {{-- Seção de Controle de Matéria Prima --}}
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
            <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">CONTROLE DE MATERIA PRIMA</h3>
            <div class="overflow-x-auto rounded-lg shadow-md">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-white">
                        <tr>
                            <form action="{{ route('financeiro.store.mp') }}" method="POST" class="contents">
                                @csrf
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                    <span class="block w-full rounded-md border border-sky-50 bg-sky-50 p-3 text-base text-gray-700">ID</span>
                                </th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-sky-900 uppercase tracking-wider">
                                    <input type="text" class="form-input block w-full rounded-md border border-sky-50 shadow-sm bg-sky-50 p-3 text-base text-sky-900" name="nome" placeholder="NOME">
                                </th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                    <input type="number" class="form-input block w-full rounded-md border border-sky-50 shadow-sm bg-sky-50 p-3 text-base text-gray-700" name="quantidade" placeholder="QUANTIDADE">
                                </th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                    <input type="text" class="form-input block w-full rounded-md border border-sky-50 shadow-sm bg-sky-50 p-3 text-base text-gray-700" name="valor" placeholder="CUSTO">
                                </th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                    <input type="date" class="form-input block w-full rounded-md border border-sky-50 shadow-sm bg-sky-50 p-3 text-base text-gray-700" name="data" placeholder="DATA">
                                </th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    <a href="#"></a>
                                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-300 ease-in-out">SALVAR</button>
                                </th>
                            </form>
                        </tr>
                        <tr class="bg-sky-800"> {{-- Cabeçalho da tabela de matéria prima com fundo vermelho escuro --}}
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">ID</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">NOME</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">QUANTIDADE</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">CUSTO</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">DATA</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody class="bg-sky-100 divide-y divide-white">
                        @foreach ($materiasPrima as $materia)
                            <tr>
                                <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-900">{{ $materia->id }}</td>
                                <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-900">{{ $materia->nome }}</td>
                                <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-900">{{ $materia->quantidade }}</td>
                                <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-900">R$ {{ number_format($materia->valor, 2, ',', '.') }}</td>
                                <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-900">{{ $materia->data }}</td>
                                <td class="px-3 py-4 whitespace-nowrap text-sm font-medium flex items-center space-x-2">
                                    {{-- Ícone de caneta para edição --}}
                                    <a href="#" class="text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    {{-- Ícone de lixeira para exclusão --}}
                                    <a href="#" class="text-red-500 hover:text-red-700 transition duration-300 ease-in-out">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection