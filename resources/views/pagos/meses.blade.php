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
        <main class=" container-fluid  p-5 text-center bg-light">
            @foreach($meses as $mes)
                <div class="card bg-light  mx-auto mb-3" style="width:50%;">
                    <h2>Mês {{ $mes['mes'] }}</h2>
        
                    <ul class="list-group list-group-horizontal justify-content-center ">
                        <li class="list-group-item me-5">Pago R${{ $mes['pago']}}</li>
                        <li class="list-group-item me-5">Recebido R${{ $mes['receber'] }}</li>
                        <li class="list-group-item">Liquido R${{ $mes['liquido'] }}</li>
                    </ul>
                </div>
            @endforeach

            <div class="card bg-light  mx-auto mb-3" style="width:50%;">
                <h2>Ano {{ $anoAtual }}</h2>
                    <ul class="list-group list-group-horizontal justify-content-center ">
                        <li class="list-group-item me-5">Pago R${{ $totalPagoAno}}</li>
                        <li class="list-group-item me-5">Recebido R${{ $totalRecebidoAno }}</li>
                        <li class="list-group-item">Liquido R${{ $liquidoAno }}</li>
                    </ul>
                </div>

        </main>
    </body>
</html>
            
