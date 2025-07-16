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
        <main class=" container-fluid  p-4 text-center">
            @foreach($objetivos as $objetivo)
                <div class="card bg-light  mx-auto mb-1 " style="width:40%;">
                    <h3>{{ $objetivo->nome }}</h3>
                    @if ($objetivo->destino == 0)
                        <p>Despesa</p>
                    
                    @else
                        <p>Entrada</p>
                    
                    @endif
                    
                    @php $valorTotal = 0 @endphp 
                    @foreach ($transferencias as $transferencia)
                    
                        @if ( $transferencia-> objetivo_Id == $objetivo -> id)
                            
                            @php $valorTotal += $transferencia -> valor @endphp
                            
                        @endif
                    @endforeach
                    <p>valor total: R${{ $valorTotal }}</p>

                    
                    <a class="btn btn-light mx-auto" href="{{ url('objetivo/'.$objetivo->id.'/ver') }}">Ver </a>

                </div>                
            @endforeach
        </main>
    </body>
</html>