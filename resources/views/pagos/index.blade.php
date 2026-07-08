<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="/public/favicon.ico">
        <title>Money</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        @vite('resources/css/app.css')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>    
    </head>
    <body class="bg-gray-100">
        @include('pagos.base')
        <main class="flex flex-col items-center gap-4 p-8">

            {{-- Mês atual --}}
            <div class="bg-gray-500 text-white rounded-xl px-6 py-3 font-semibold text-sm">
                {{ $mesEscrito . ' de ' . $anoAtual }}
            </div>

            {{-- Despesa --}}
            <a href="{{ url('pago/pago/'.$mesEscrito.'/'.$anoAtual) }}"
                class="bg-red-500 hover:bg-red-600 text-white rounded-xl px-6 py-3 font-semibold text-sm no-underline transition">
                Despesa R$ {{ $total_pago }}
            </a>

            {{-- Entrada --}}
            <a href="{{ url('receber/receber/'.$mesEscrito.'/'.$anoAtual) }}"
                class="bg-green-500 hover:bg-green-600 text-white rounded-xl px-6 py-3 font-semibold text-sm no-underline transition">
                Entrada R$ {{ $total_receber }}
            </a>

            {{-- Saldo --}}
            @if($total >= 0)
                <div class="bg-green-500 text-white rounded-xl px-6 py-3 font-semibold text-sm">
                    Saldo final R$ {{ $total }}
                </div>
            @else
                <div class="bg-red-500 text-white rounded-xl px-6 py-3 font-semibold text-sm">
                    Saldo final R$ {{ $total }}
                </div>
            @endif

            {{-- Categorias --}}
            <a href="{{ url('objetivo') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white rounded-xl px-6 py-3 font-semibold text-sm no-underline transition">
                Categorias
            </a>

        </main>
    </body>
</html>