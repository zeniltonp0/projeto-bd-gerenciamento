@extends('layouts.navbar') 

@section('content')
    <div class="container bg-white p-6 rounded-xl shadow-lg mx-auto my-8">

        <h2 class="text-4xl font-bold text-gray-800 mb-6 text-center">PRODUTOS CADASTRADOS</h2>
        

        <div class="overflow-x-auto rounded-lg shadow-md">
            
            <table class="min-w-full divide-y divide-gray-300">
                
                <thead class="bg-white"> 
                    <tr>
                        
                        <form action="#" method="POST" class="contents"> 
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                
                                <span class="block w-full rounded-md bg-white p-3 text-base text-gray-500">ID</span>
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="text" class="form-input block w-full rounded-md border-gray-300 shadow-sm bg-slate-100 p-3 text-base" name="new_nome" placeholder="NOME">
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="text" class="form-input block w-full rounded-md border-gray-300 shadow-sm bg-slate-100 p-3 text-base" name="new_descricao" placeholder="DESCRIÇÃO">
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="text" class="form-input block w-full rounded-md border-gray-300 shadow-sm bg-slate-100 p-3 text-base" name="new_preco" placeholder="PREÇO">
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-300 ease-in-out">SALVAR</button>
                            </th>
                        </form>
                    </tr>
                    <tr class="bg-slate-400"> 
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">NOME</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">DESCRIÇÃO</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">PREÇO</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">AÇÕES</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    

                    
                    @foreach ($produtos as $produto)
                        
                        <tr class="bg-slate-100 hover:bg-slate-200 transition duration-150 ease-in-out">
                            
                            <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-900">{{ $produto->id }}</td>
                            <td class="px-3 py-4 whitespace-nowrap">
                                <input type="text" class="form-input block w-full rounded-md border-gray-300 shadow-sm bg-white p-3 text-base" name="nome" value="{{ $produto->nome }}">
                            </td>
                            <td class="px-3 py-4 whitespace-nowrap">
                                <input type="text" class="form-input block w-full rounded-md border-gray-300 shadow-sm bg-white p-3 text-base" name="descricao" value="{{ $produto->descricao }}">
                            </td>
                            <td class="px-3 py-4 whitespace-nowrap">
                                <input type="text" class="form-input block w-full rounded-md border-gray-300 shadow-sm bg-white p-3 text-base" name="preco" value="{{ number_format($produto->preco, 2, ',', '.') }}">
                            </td>
                            <td class="px-3 py-4 whitespace-nowrap text-sm font-medium flex items-center space-x-2">
                                
                                <a href="#" class="text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                
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
@endsection