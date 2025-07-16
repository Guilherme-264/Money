<header class="container-fluid bg-black p-3">
      <h1 class="text-center">
          <a class="nav-link text-success" href="{{ url('pago/') }}">Money$</a> 
      </h1>
</header>
<nav class="navbar navbar-expand-sm bg-dark">
    <div class="container-fluid justify-content-end">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ url('pago/') }}">inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ url('pago/create/') }}">Criar despesa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ url('receber/create/') }}">Criar entrada</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ url('objetivo/create/') }}">Criar categoria</a>
            </li>
        </ul>
    </div>
</nav>