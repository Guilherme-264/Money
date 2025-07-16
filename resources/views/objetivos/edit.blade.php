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
        @include ('objetivos.base')
        <main class=" container-fluid   p-4 text-center">

            <form class="d-flex flex-column mx-auto w-25 bg-light" action="{{ url('objetivo') }}" method="POST">
                @csrf
                @method ('PUT')

                <div class="container">
                    <h2 class="text-success">Editar Categoria</h2>

                    <label class="mt-3" for="nome">Nome</label>
                    <input class="form-control" type="text" name="nome" placeholder="Name" required><br>
                
                    <button class="btn btn-success mt-5" type="submit">Editar</button>
                </div>
            </form>
        </main> 
    </body>
</html>