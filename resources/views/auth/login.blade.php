@extends('layouts.app') {{-- Estende o layout base que você criou --}}

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8 p-6 bg-white rounded-lg shadow-md">
    <div>
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        Faça login na sua conta
      </h2>
    </div>

    <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
      @csrf {{-- Token CSRF é essencial para segurança --}}

      {{-- Exibição de erros de validação --}}
      @if ($errors->any())
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
              <ul class="list-disc pl-5">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <div class="rounded-md shadow-sm -space-y-px">
        <div>
          <label for="email-address" class="sr-only">Endereço de Email</label>
          <input id="email-address" name="email" type="email" autocomplete="email" required
                 class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                 placeholder="Endereço de Email" value="{{ old('email') }}">
        </div>
        <div>
          <label for="password" class="sr-only">Senha</label>
          <input id="password" name="password" type="password" autocomplete="current-password" required
                 class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                 placeholder="Senha">
        </div>
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input id="remember_me" name="remember" type="checkbox"
                 class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
          <label for="remember_me" class="ml-2 block text-sm text-gray-900">
            Lembrar-me
          </label>
        </div>

        <div class="text-sm">
          @if (Route::has('password.request')) {{-- Verifica se a rota de redefinição de senha existe --}}
            <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
              Esqueceu sua senha?
            </a>
          @endif
        </div>
      </div>

      <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Entrar
        </button>
      </div>

      @if (Route::has('register')) {{-- Verifica se a rota de registro existe (se você reabilitar) --}}
      <div class="text-center text-sm mt-4">
        Não tem uma conta? <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Registre-se</a>
      </div>
      @endif
    </form>
  </div>
</div>
@endsection