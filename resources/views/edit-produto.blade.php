@extends('layouts.navbar')

@section('content')
    <div class="container bg-white p-6 rounded-xl shadow-lg mx-auto my-8">
        <h2 class="text-4xl font-bold text-gray-800 mb-6 text-center">EDITAR PRODUTO</h2>

        <form method="POST" action="{{ route('produtos.update', $produto->id) }}" >
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nome" class="block text-gray-700 text-sm font-bold mb-2">Nome:</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome', $produto->nome) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('nome') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="descricao" class="block text-gray-700 text-sm font-bold mb-2">Descrição:</label>
                <input type="text" name="descricao" id="descricao" value="{{ old('descricao', $produto->descricao) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('descricao') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="preco" class="block text-gray-700 text-sm font-bold mb-2">Preço:</label>
                <input type="number" name="preco" id="preco" value="{{ old('preco', $produto->preco) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('preco') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Atualizar Produto
                </button>
                <a href="{{ route('produtos.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection