<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>   
        <script>
            window.anoAtual = @json($anoAtual);
        </script>
        @vite (['resources/js/app.js', 'resources/css/app.css'])
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <title>Money</title>
    </head>
<body class="bg-gray-100">
    @include('pagos.base')
    <main class="container mx-auto px-5 py-8 text-center">

        {{-- Seletor de ano --}}
        <div class="mb-8">
            <form method="GET" action="{{ url('pago/meses') }}" id="formAno">
                <input type="hidden" name="ano" id="anoInput" value="{{ $anoAtual }}">

                <div class="inline-flex flex-col items-center gap-3 bg-white rounded-2xl px-8 py-6 shadow-md w-full max-w-xs">
                    <span class="text-xs font-semibold tracking-widest uppercase text-gray-400">Selecione o ano</span>

                    <div class="flex items-center gap-5">
                        <button type="button" id="btnMenos"
                            class="w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 active:scale-95 text-gray-600 text-2xl flex items-center justify-center transition disabled:opacity-30 disabled:cursor-not-allowed">
                            -
                        </button>

                        <span id="anoDisplay" data-ano="{{ $anoAtual }}"
                            class="text-4xl font-bold text-gray-900 min-w-[80px] text-center">
                            {{ $anoAtual }}
                        </span>

                        <button type="button" id="btnMais"
                            class="w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 active:scale-95 text-gray-600 text-2xl flex items-center justify-center transition disabled:opacity-30 disabled:cursor-not-allowed">
                            +
                        </button>
                    </div>

                    <button type="submit"
                        class="md:hidden mt-1 px-8 py-2 bg-gray-900 text-white rounded-lg text-sm font-semibold tracking-wide hover:bg-gray-700 transition">
                        OK
                    </button>
                </div>
            </form>
        </div>

        {{-- Cards dos meses --}}
        @foreach($meses as $mes)
            <div class="bg-white rounded-2xl shadow-md mx-auto mb-4 w-full md:w-1/2">
                <h2 class="text-xl font-bold text-gray-800 py-3 border-b border-gray-100">
                    Mês {{ $mes['mes'] }}
                </h2>
                <div class="flex justify-center divide-x divide-gray-100">
                    <a href="{{ url('pago/pago/'.$mes['mes'].'/'.$anoAtual) }}"
                        class="flex-1 py-3 px-4 text-md text-red-500 hover:bg-red-50 transition no-underline">
                        Despesas<br>
                        <span class="font-semibold">R$ {{ $mes['pago'] }}</span>
                    </a>
                    <a href="{{ url('receber/receber/'.$mes['mes'].'/'.$anoAtual) }}"
                        class="flex-1 py-3 px-4 text-bg text-green-500 hover:bg-green-50 transition no-underline">
                        Entrada<br>
                        <span class="font-semibold">R$ {{ $mes['receber'] }}</span>
                    </a>
                    <div class="flex-1 py-3 px-4 text-bg text-gray-600">
                        Líquido<br>
                        <span class="font-semibold">R$ {{ $mes['liquido'] }}</span>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- Card do total do ano --}}
        <div class="bg-white rounded-2xl shadow-md mx-auto mb-6 w-full md:w-1/2">
            <h2 class="text-xl font-bold text-gray-800 py-3 border-b border-gray-100">
                Ano {{ $anoAtual }}
            </h2>
            <div class="flex justify-center divide-x divide-gray-100">
                <div class="flex-1 py-3 px-4 text-sm text-red-500">
                    Despesas<br>
                    <span class="font-semibold">R$ {{ $totalPagoAno }}</span>
                </div>
                <div class="flex-1 py-3 px-4 text-sm text-green-500">
                    Entrada<br>
                    <span class="font-semibold">R$ {{ $totalRecebidoAno }}</span>
                </div>
                <div class="flex-1 py-3 px-4 text-sm text-gray-600">
                    Líquido<br>
                    <span class="font-semibold">R$ {{ $liquidoAno }}</span>
                </div>
            </div>
        </div>

        {{-- Gráfico --}}
        <canvas id="grafico" class="w-full md:w-1/2 mx-auto"
            data-labels='@json($mesesDoAno)'
            data-data='@json($liquidoPorMes)'>
        </canvas>

    </main>
</body>
</html>
            
