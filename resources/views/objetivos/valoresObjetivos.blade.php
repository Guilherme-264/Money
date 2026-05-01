<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/css/app.css'])
    <title>Money</title>
</head>
<body class="bg-gray-100">
    @include('objetivos.base')

    <main class="container mx-auto px-4 py-6">
        <div class="bg-white rounded-2xl shadow-md mx-auto w-full md:w-1/2">

            <div class="px-6 py-4 border-b border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800">{{ $objetivo->nome }}</h3>

                @if($objetivo->destino == 0)
                    <span class="inline-block text-xs font-semibold px-3 py-1 rounded-full bg-red-100 text-red-500">
                        Despesa
                    </span>
                    @php $situacao = "Destino" @endphp
                @else
                    <span class="inline-block text-xs font-semibold px-3 py-1 rounded-full bg-green-100 text-green-600">
                        Entrada
                    </span>
                    @php $situacao = "Pagador" @endphp
                @endif
            </div>

            <div class="px-6 py-4 text-sm text-gray-600 divide-y divide-gray-100">
                @php $valor = 0; @endphp
                @foreach($transferencias as $transferencia)
                    @if($transferencia->objetivo_Id == $objetivo->id)
                        <div class="py-2 flex justify-between">
                            <span>{{ $situacao }}: {{ $transferencia->nome }}</span>
                            <span class="font-medium text-gray-800">R$ {{ $transferencia->valor }}</span>
                        </div>
                        @php $valor += $transferencia->valor @endphp
                    @endif
                @endforeach
            </div>

            <div class="px-6 py-3 border-t border-gray-100 flex justify-between items-center">
                <span class="text-sm font-semibold text-gray-700">Total</span>
                <span class="text-sm font-bold text-gray-900">R$ {{ $valor }}</span>
            </div>

            <div class="px-6 py-4 border-t border-gray-100 flex justify-center gap-2">
                <a href="{{ url('objetivo/'.$objetivo->id.'/edit') }}"
                    class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium no-underline transition">
                    Editar
                </a>
                <form action="{{ url('objetivo/'.$objetivo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-medium transition">
                        Deletar
                    </button>
                </form>
            </div>

        </div>
    </main>
</body>
</html>