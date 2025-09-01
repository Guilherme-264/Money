<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        @vite (['resources/js/app.js'])
        <title>Document</title>
    </head>
    <body>
        @include ('objetivos.base')
        <main class=" container-fluid   p-4 text-center">

            <form class="d-flex flex-column mx-auto w-25 bg-light" action="{{ url('objetivo') }}" method="POST">
                @csrf
                <div class="container">
                    <h2 class="text-success">Cadastro de Categoria</h2>

                    <label class="mt-3" for="nome">Nome</label>
                    <input class="form-control" type="text" name="nome" placeholder="Name" required><br>
                    
                    <input class="form-check-input" type="radio" name="destino" value=0>
                    <label class="form-check-label me-3" for= 0>Gasto</label>

                    <input class="form-check-input" type="radio" name="destino" value= 1>
                    <label class="form-check-label" for= 1>Receber</label><br>

                    <button id="btnSend" class="btn btn-success mt-5" type="submit">Criar categoria</button>
                </div>
            </form>
        </main>    
    </body>
</html>