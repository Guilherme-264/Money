<header class="container-fluid bg-black p-3">
      <h1 class="text-center">
          <a class="nav-link text-success" href="{{ url('pago/') }}">Money$</a> 
      </h1>
</header>
<nav class="navbar navbar-expand-sm bg-dark">
    <div class="container-fluid justify-content-end">
        <ul class="navbar-nav">
            
            <!-- inicio -->
            <li class="nav-item me-3">
                <a class="nav-link text-white" href="{{ url('pago/') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Início">                            
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z"/>
                    </svg>
                </a>
            </li>

            <!-- meses -->
            <li class="nav-item me-3">
                <a class="nav-link text-white" href="{{ url('pago/meses/') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Meses">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                        <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z"/>
                        <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                    </svg>
                </a>
            </li>
            
            <!-- adicionar -->
            <li class="nav-item me-3 dropdown dropstart text-end">
                <button  type="button" class="nav-link text-white dropdown-toggle" data-bs-toggle="dropdown" data-bs-placement="bottom" title="Adicionar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
                    </svg>
                </button>
                <!-- dropdown -->
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ url('pago/create/') }}">Cadastrar Despesa </a></li>
                    <li><a class="dropdown-item" href="{{ url('receber/create/') }}">Cadastrar Entrada</a></li>
                    <li><a class="dropdown-item" href="{{ url('objetivo/create/') }}">Cadastrar Categoria</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

   