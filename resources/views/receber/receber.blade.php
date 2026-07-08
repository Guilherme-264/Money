<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    <title>Money</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="bg-gray-100">
    @include('receber.base')

    <main class="container mx-auto px-4 py-6">
        @foreach($receber as $entity)
            <div class="bg-white rounded-2xl shadow-md mx-auto mb-4 w-full md:w-1/2">

                <div class="px-6 py-4">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $entity->nome }}</h3>
                    <p class="text-gray-500 text-sm">Valor: R$ {{ $entity->valor }}</p>
                </div>

                <div id="collapse-{{ $entity->id }}" class="hidden px-6 pb-4 pt-3 text-sm text-gray-600 border-t border-gray-100">
                    <p>Descrição: {{ $entity->descricao }}</p>
                    <p>Data: {{ \Carbon\Carbon::parse($entity->data_recebido)->format('d/m/Y') }}</p>
                    <p>Categoria: {{ $entity->objetivo->nome }}</p>

                    <div class="flex gap-2 mt-4 justify-center">
                        <a href="{{ url('receber/'.$entity->id.'/edit') }}"
                            class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium no-underline transition">
                            Editar
                        </a>
                        <form action="{{ url('receber/'.$entity->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-medium transition">
                                Deletar
                            </button>
                        </form>
                    </div>
                </div>

                <button type="button"
                    data-collapse="collapse-{{ $entity->id }}"
                        class="text-center block w-1/2 mx-auto py-2 text-sm bg-gray-50 text-gray-400 hover:text-gray-600 border-none transition no-underline">
                    Ver mais
                </button>

            </div>
        @endforeach
    </main>
</body>
</html>