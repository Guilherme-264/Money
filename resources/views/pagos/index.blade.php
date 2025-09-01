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
            <div class="card text-bg-secondary mx-auto " style="width:200px; height: 60px">
                <div class="card-body d-flex align-items-center justify-content-center">

                    <p class="card-text h6" style="text-decoration: none" href="#">{{$mesEscrito. (' de '). $anoAtual }} </p>
                </div> 
            </div>
            </br>

            <div class="card bg-danger mx-auto " style="width:200px; height: 60px">
                <div class="card-body d-flex align-items-center justify-content-center">
                    <a class="card-text text-white h6" style="text-decoration: none" href="{{url('pago/pago')}}">Despesa R${{$total_pago}} </a>
                </div>
            </div>
            <br/>   

            <div class="card bg-success mx-auto " style="width:200px; height: 60px">
                <div class="card-body d-flex align-items-center justify-content-center">
                    <a class="card-text text-white h6" style="text-decoration: none" href="{{url('receber/receber')}}">Entrada R${{$total_receber}} </a>
                </div>
            </div>
            <br/>   
            
            @if ($total >=0)
                <div class="card bg-success  mx-auto " style="width:200px; height: 60px"> 
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <p class="card-text text-white h6">Saldo final R${{$total}}</p>
                    </div>
                </div>
    
            @else
                <div class="card bg-danger  mx-auto " style="width:200px; height: 60px"> 
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <p class="card-text text-white h6">Saldo final R${{$total * -1}}</p>
                    </div>
                </div>
            @endif
            <br/>
            <div class="card bg-secondary   mx-auto " style="width:200px; height: 60px"> 
                <div class="card-body d-flex align-items-center justify-content-center"> 
                    <a class="card-text text-white h6" style="text-decoration: none" href="{{url('objetivo')}}">Categorias</a>
                </div>
            </div>
        </main>
    </body>
</html>