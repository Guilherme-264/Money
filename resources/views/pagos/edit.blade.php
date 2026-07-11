<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">

    <title>Money</title>
</head>
<body class="bg-gray-100">
    @include('pagos.base')

    <main class="container mx-auto px-4 py-6">
        <form action="{{ url('pago/'.$pago->id) }}" method="POST"
            class="bg-white rounded-2xl shadow-md mx-auto w-full md:w-1/3 px-8 py-6">
            @csrf
            @method('PUT')

            <h2 class="text-lg font-semibold text-green-600 mb-6 text-center">Atualizar Despesa</h2>

            <div class="flex flex-col gap-4">

                <div class="flex flex-col gap-1">
                    <label class="text-sm text-gray-600 font-medium" for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome" value="{{ $pago->nome }}"
                        class="border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-300
                        @error('nome') !border-red-500 focus:ring-red-300 @else border-gray-200 focus:ring-green-300 @enderror"
                        required>
                        @error('nome')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-sm text-gray-600 font-medium" for="valor">Valor</label>
                    <input type="number" name="valor" id="valor" placeholder="0,00" step="0.01" value="{{ $pago->valor }}"
                        class="border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-300
                        @error('valor') !border-red-500 focus:ring-red-300 @else border-gray-200 focus:ring-green-300 @enderror"
                        required>
                        @error('valor')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-sm text-gray-600 font-medium" for="descricao">Descrição</label>
                    <input type="text" name="descricao" id="descricao" placeholder="Descrição" value="{{ $pago->descricao }}"
                        class="border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-300
                        @error('descricao') !border-red-500 focus:ring-red-300 @else border-gray-200 focus:ring-green-300 @enderror"
                        required>
                        @error('descricao')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-sm text-gray-600 font-medium" for="data_recebido">Data pagamento</label>
                    <input type="date" name="data_recebido" id="data_recebido" value="{{ $pago->data_recebido }}"
                        class="border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-300
                        @error('data_recebido') !border-red-500 focus:ring-red-300 @else border-gray-200 focus:ring-green-300 @enderror"
                        required>
                        @error('data_recebido')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                </div>

                <button type="submit" id="btnSend"
                    class="mt-2 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg text-sm font-semibold border-none transition">
                    Atualizar despesa
                </button>

            </div>
        </form>
    </main>
</body>
</html>