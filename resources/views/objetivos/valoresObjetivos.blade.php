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
                
        <main class=" container-fluid  p-4 text-center ">

            <div class="card bg-light  mx-auto mb-1 " style="width:50%; ">

                <h3 class="mb-2">{{ $objetivo->nome }}</h3>
                @php $valor = 0; @endphp
                 @if ($objetivo -> destino == 0)
                        <p>Despesa</p>
                        @php $situacao = "Destino" @endphp

                    @else
                        <p>Entrada</p>
                        @php $situacao = "Pagador" @endphp

                    @endif

                @foreach ($transferencias as $transferencia  )

                    @if ($transferencia->objetivo_Id == $objetivo->id)
                        
                        <p>{{ $situacao }} : {{ $transferencia->nome }} R${{ $transferencia->valor }}</p>
                        @php $valor += $transferencia->valor @endphp
                    @endif
                @endforeach
                <p>Total: R${{ $valor }}</p>


                <form class="mb-2" action="{{ url('objetivo/'.$objetivo->id) }}" method="POST">
                    <a class="btn btn-primary me-1" href="{{ url('objetivo/'.$objetivo->id.'/edit') }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Deletar</button>
                </form>
            </div>

        </main>
    </body>
</html>