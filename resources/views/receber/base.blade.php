<header class="bg-black py-3">
    <h1 class="text-center">
        <a class="text-green-500 no-underline text-2xl font-bold" href="{{ url('pago/') }}">Money$</a>
    </h1>
</header>

<nav class="bg-gray-900 px-4 py-2">
    <div class="flex justify-end items-center gap-4">

        {{-- Início --}}
        <a href="{{ url('pago/') }}" class="text-white hover:text-green-400 transition"
            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Início">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z"/>
            </svg>
        </a>

        {{-- Meses --}}
        <a href="{{ url('pago/meses/') }}" class="text-white hover:text-green-400 transition"
            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Meses">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z"/>
                <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
            </svg>
        </a>

        {{-- Adicionar (dropdown Bootstrap) --}}
        <div class="dropdown dropstart">
            <button type="button" class="bg-transparent border-none text-white hover:text-green-400 transition dropdown-toggle"
                data-bs-toggle="dropdown" title="Adicionar">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
                </svg>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ url('pago/create/') }}">Cadastrar Despesa</a></li>
                <li><a class="dropdown-item" href="{{ url('receber/create/') }}">Cadastrar Entrada</a></li>
                <li><a class="dropdown-item" href="{{ url('objetivo/create/') }}">Cadastrar Categoria</a></li>
            </ul>
        </div>

        <div class="dropdown dropstart">
            <button type="button" class="border-none transition"
                data-bs-toggle="dropdown" title="Usuário"
                style="background-color: #7c3aed; border-radius: 50%; width: 36px; height: 36px; color: white; font-weight: bold; font-size: 16px; display: flex; align-items: center; justify-content: center;">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><span class="dropdown-item-text text-muted">{{ Auth::user()->name }}</span></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">Sair</button>
                    </form>
                </li>
            </ul>
        </div>

    </div>
</nav>