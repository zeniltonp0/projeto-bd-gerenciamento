@extends('layouts.navbar')

@section('content')
    <div class="container bg-white p-6 rounded-xl shadow-lg mx-auto my-8">
        <h2 class="text-4xl font-bold text-gray-800 mb-6 text-center">EDITAR FUNCIONÁRIO</h2>

        <form method="POST" action="{{ route('financeiro.funcionarios.update', $funcionario->id) }}" >
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nome" class="block text-gray-700 text-sm font-bold mb-2">Nome:</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome', $funcionario->nome) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('nome') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="diaria" class="block text-gray-700 text-sm font-bold mb-2">Diária:</label>
                <input type="text" name="diaria" id="diaria" value="{{ old('diaria', $funcionario->diaria) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('diaria') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="dias_trabalhados" class="block text-gray-700 text-sm font-bold mb-2">Dias Trabalhados:</label>
                <input type="number" name="dias_trabalhados" id="dias_trabalhados" value="{{ old('dias_trabalhados', $funcionario->dias_trabalhados) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('dias_trabalhados') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label for="salario" class="block text-gray-700 text-sm font-bold mb-2">Salário Pago:</label>
                <input type="text" name="salario" id="salario" value="{{ old('salario', $funcionario->salario) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('salario') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Atualizar Funcionário
                </button>
                <a href="{{ route('financeiro.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection