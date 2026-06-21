<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <title>Money</title>
</head>
<body class="bg-gray-100">
    @include('objetivos.base')

    <main class="container mx-auto px-4 py-6">
        @php $contador = 0; @endphp
        @foreach($objetivos as $objetivo)
            <div class="bg-white rounded-2xl shadow-md mx-auto mb-3 w-full md:w-2/5">

                <div class="px-6 py-4">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $arrayLabel[$contador] }}</h3>

                    @if($arrayDestino[$contador] == 0)
                        <span class="inline-block text-xs font-semibold px-3 py-1 rounded-full bg-red-100 text-red-500">
                            Despesa
                        </span>
                    @else
                        <span class="inline-block text-xs font-semibold px-3 py-1 rounded-full bg-green-100 text-green-600">
                            Entrada
                        </span>
                    @endif

                    <p class="text-gray-500 text-sm mt-2">Valor total: R$ {{ $arrayData[$contador] }}</p>
                </div>

                <div class="blockborder-t border-gray-100">
                    <a href="{{ url('objetivo/'.$arrayId[$contador].'/ver') }}"
                        class="text-center block w-1/2 mx-auto py-2 text-sm text-gray-400 hover:text-gray-600 hover:bg-gray-50 transition no-underline">
                        Ver
                    </a>
                </div>

            </div>
            @php $contador++ @endphp
        @endforeach

        <canvas
            id="grafico"
            data-labels='@json($arrayLabel)'
            data-data='@json($arrayData)'
            data-destino='@json($arrayDestino)'
            class="mx-auto w-full md:w-1/4 mt-6">
        </canvas>
    </main>
</body>
</html>