@extends('layouts.navbar')

@section('content')
    <div class="container bg-white p-6 rounded-xl shadow-lg mx-auto my-8">
        <h2 class="text-4xl font-bold text-gray-800 mb-6 text-center">EDITAR PEDIDO</h2>

        <form method="POST" action="{{ route('pedidos.update', $pedido->id) }}" >
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="data" class="block text-gray-700 text-sm font-bold mb-2">Data:</label>
                <input type="date" name="data" id="data" value="{{ old('data', $pedido->data) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('data') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="cliente" class="block text-gray-700 text-sm font-bold mb-2">Cliente:</label>
                <input type="text" name="cliente" id="cliente" value="{{ old('cliente', $pedido->cliente) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('cliente') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="endereco" class="block text-gray-700 text-sm font-bold mb-2">Endereço:</label>
                <input type="text" name="endereco" id="endereco" value="{{ old('endereco', $pedido->endereco) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('endereco') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="quantidade" class="block text-gray-700 text-sm font-bold mb-2">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" value="{{ old('quantidade', $pedido->quantidade) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('quantidade') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @php
                        $statuses = ['Feito', 'Entregue', 'Pago']; 
                    @endphp
                    @foreach ($statuses as $status)
                        <option value="{{ $status }}" {{ old('status', $pedido->status) === $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
                @error('status') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="total" class="block text-gray-700 text-sm font-bold mb-2">Total:</label>
                <input type="text" name="total" id="total" value="{{ old('total', $pedido->total) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('valor') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Atualizar Pedido
                </button>
                <a href="{{ route('pedidos.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection