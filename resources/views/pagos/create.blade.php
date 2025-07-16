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
        @include ('pagos.base')
        
        <main class=" container-fluid   p-4 text-center">
            <form class="d-flex flex-column mx-auto w-25 bg-light" action="{{ url('pago') }}" method="POST">
                @csrf

                <div class="container ">
                    <h2 class="text-success">Cadastro de Despesa</h2>
                    
                    <label class="mt-3" for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" placeholder="Name" required>

                    <label class="mt-3" for="valor">Valor</label>
                    <input class="form-control" type="number" name="valor" placeholder="valor" required>

                    <label class="mt-3" for="descricao">Descrição</label>
                    <input class="form-control" type="text" name="descricao" placeholder="Descição" required>

                    <label class="mt-3" data_recebido for="data_recebido">Data pagamento</label>
                    <input class="form-control" type="date" name="data_recebido" placeholder="Data pagamento" required>
                    


                    <label class="mt-3" for="objetivo_Id">objetivo</label>
                    <select class="form-control" name="objetivo_Id" id="objetivo_Id">
                        @foreach ($objetivos as $objetivo)
                        
                        @if ($objetivo->destino == 0)
                            <option value= '{{ $objetivo->id }}'>{{ $objetivo->nome }}</option>
                        @endif
                        
                        @endforeach
                    </select>

                    <button class="btn btn-success mt-5" type="submit">Criar despesa</button>
                </div>
            </form>
        </main>
    </body>
</html>
