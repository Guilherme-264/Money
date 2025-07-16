<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>    <title>Document</title>
</head>
    <body>
        @include ('receber.base')
                
        
        <main class=" container-fluid   p-4 text-center">
            <form class="d-flex flex-column mx-auto w-25 bg-light" action="{{ url('receber/'.$receber->id) }}" method="POST">
                <div class="container ">    
                    @csrf
                    @method ('PUT')
                    <h2 class="text-success">Atualizar de Entrada</h2>

                    <label class="mt-3" for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" placeholder="Name" value="{{ $receber->nome }}" required>

                    <label class="mt-3" for="valor">Valor</label>
                    <input class="form-control" type="number" name="valor" placeholder="valor" value="{{ $receber->valor }}" required>

                    <label class="mt-3" for="descricao">Descrição</label>
                    <input class="form-control" type="text" name="descricao" placeholder="Descição" value="{{ $receber->descricao }}" required>

                    <label class="mt-3" data_recebido for="data_recebido">Data pagamento</label>
                    <input class="form-control" type="date" name="data_recebido" placeholder="Data pagamento" value="{{ $receber->data_recebido }}"required>

                    <button class="btn btn-success mt-5" type="submit">Atualizar de entrada</button>
                </div>
            </form>
        </main>
    </body>
</html>