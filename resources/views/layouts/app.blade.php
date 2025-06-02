<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- Importante para segurança dos formulários --}}

    <title>{{ config('app.name', 'Meu App') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
    <div id="app">
        {{-- Aqui é onde o conteúdo das suas outras views será injetado --}}
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>