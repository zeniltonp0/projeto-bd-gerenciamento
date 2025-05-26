<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkmate Empadas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color:rgb(255, 255, 255); 
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex flex-col items-center py-8 px-4 sm:px-6 lg:px-8">
        
        <nav class="w-full max-w-7xl bg-slate-400 p-4 rounded-xl shadow-lg flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0 md:space-x-4 mb-8">
            <div class="flex flex-wrap justify-center md:justify-start items-center space-x-2 sm:space-x-4 w-full md:w-auto">
                <a href="{{ route('pedidos.index') }}" class="relative px-4 py-2 bg-white text-gray-800 rounded-full shadow-md hover:bg-stone-400 transition duration-300 ease-in-out flex items-center">
                    PEDIDOS
                    
                    <span class="ml-2 bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full flex items-center justify-center">
                        <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L14 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                        </svg>
                    </span>
                </a>
                <a href="{{ route('produtos.index') }}" class="px-4 py-2 bg-white text-gray-800 rounded-full shadow-md hover:bg-stone-300 transition duration-300 ease-in-out">PRODUTOS</a>
                <a href="{{ route('financeiro.index') }}" class="px-4 py-2 bg-white text-gray-800 rounded-full shadow-md hover:bg-stone-300 transition duration-300 ease-in-out">FINANCEIRO</a>
            </div>

            <div class="flex items-center space-x-4 mt-4 md:mt-0">
                <a href="{{ route('dashboard.index') }}" class="p-2 text-white hover:text-gray-900 transition duration-300 ease-in-out">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </a>
                <a href="#" class="p-2 text-white hover:text-gray-900 transition duration-300 ease-in-out">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </a>
            </div>
        </nav>

        
        <main class="w-full max-w-7xl mt-0">
            @yield('content')
        </main>
    </div>
</body>
</html>