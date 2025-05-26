@extends('layouts.navbar')

@section('content')
    <div class="container bg-white p-6 rounded-xl shadow-lg mx-auto my-8">
        <h2 class="text-4xl font-bold text-gray-800 mb-6 text-center">EDITAR MATÉRIA PRIMA</h2>

        <form method="POST" action="{{ route('financeiro.materiaprima.update', $materiaPrima->id) }}" >
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nome" class="block text-gray-700 text-sm font-bold mb-2">Nome:</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome', $materiaPrima->nome) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('nome') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="diaria" class="block text-gray-700 text-sm font-bold mb-2">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" value="{{ old('quantidade', $materiaPrima->quantidade) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('quantidade') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="valor" class="block text-gray-700 text-sm font-bold mb-2">Valor:</label>
                <input type="number" name="valor" id="valor" value="{{ old('valor', $materiaPrima->valor) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('valor') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label for="data" class="block text-gray-700 text-sm font-bold mb-2">Data:</label>
                <input type="date" name="data" id="data" value="{{ old('data', $materiaPrima->data) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('data') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Atualizar Matéria Prima
                </button>
                <a href="{{ route('financeiro.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection