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

        <main class=" container-fluid  p-4 text-center ">
            @foreach($pagos as $pago)
                <div class="card bg-light  mx-auto mb-2 " style="width:50%;">
                    <h3>{{ $pago->nome }}</h3>
                    <p>Valor: R${{ $pago->valor }}
                    <div id="{{$pago->id}}" class="collapse mb-2">

                        <p>Descrição: {{ $pago->descricao }}</p>
                        <p>Data:  {{ \Carbon\Carbon::parse($pago->data_recebido)->format('d/m/Y') }}</p>
                        <p>Categoria: {{ $pago->objetivo->nome}}</p>

                        <form action="{{ url('pago/'.$pago->id) }}" method="POST">
                            <a class="btn btn-primary me-1" href="{{ url('pago/'.$pago->id.'/edit') }}">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Deletar</button>
                        </form>
                    </div>
                    
                    <button type="button" class="btn btn-light mx-auto" style="width:40%" data-bs-toggle="collapse" data-bs-target="#{{$pago->id}}">Ver mais</button>

                </div>
                
            @endforeach
        </main>
        
    </body>
</html>