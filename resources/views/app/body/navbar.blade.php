@php

date_default_timezone_set('America/Sao_paulo');
setlocale(LC_ALL, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese_brazil', 'portuguese_brazilian', 'bra', 'brazil', 'br');
setlocale(LC_TIME, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese_brazil', 'portuguese_brazilian', 'bra', 'brazil', 'br');

$pgt = App\Models\Pagamentos\Pagamento::where('data_pagamento_geral', '<', Carbon\Carbon::now()->format('Y-m-d'))
    ->where('status', 0)
    ->where('status_noti', 0)
    ->get();

@endphp

<header id="header" class="header fixed-top d-flex align-items-center">

    {{-- LADO ESQUERDO - LOGO --}}
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            {{-- <img src="{{ (!empty(Auth::user()->profile_photo_path)) ? asset('upload/imagem_usuario/'.Auth::user()->profile_photo_path) : '' }}"  alt="Profile" class="rounded-circle"> --}}
            <span class="d-none d-lg-block">JP Assessoria</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    {{-- Barra de Pesquisa --}}
    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" onfocus="mostrar()" onblur="esconder()" id="pesquisar" name="pesquisar"
                placeholder="Pesquisar">
            <button type="button"><i class="bi bi-search"></i></button>
            <div id="pesquisarAlunos" class="pesquisar"></div>
        </form>
    </div>

    {{-- LADO DIREITO --}}
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            {{-- Barra de Pesquisa --}}
            {{-- <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li> --}}

            {{-- Notificações da Conta --}}
            <li class="nav-item dropdown">
                {{-- Badge Vermelho com Número de Pendencias --}}
                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-danger badge-number">{{ count($pgt) }}</span>
                </a>

                {{-- Dropdown com as Notificações --}}
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        Você tem {{ count($pgt) }} novas notificações.
                    </li>

                    @foreach ($pgt as $pg)
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <form action="{{ route('pagamentos.validar.notificacoes', $pg->id) }}" method="post">
                            @csrf

                            <li class="notification-item">
                                <i class="bi bi-exclamation-circle text-danger"></i>
                                <button class="ver-todas-notificacoes">
                                    <div>
                                        <h4>{{ $pg->aluno->nome }}</h4>
                                        <p>{{ ucwords($pg->tipo_servico) }}</p>

                                        <p>Valor: <b class="text-success">R$ {{ $pg->valor_pagamento_geral }}</b>
                                        </p>

                                        <p style="text-transform: capitalize;">Vencimento: <b
                                                class="text-danger">{{ strftime('%d %B %Y.', strtotime($pg->data_pagamento_geral)) }}</b>
                                        </p>

                                    </div>
                                </button>
                            </li>

                        </form>
                    @endforeach
                </ul>
            </li>

            {{-- Novas Mensagens --}}
            {{-- <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-chat-left-text"></i>
                    <span class="badge bg-success badge-number">3</span>
                </a>
                <!-- End Messages Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                    <li class="dropdown-header">
                        You have 3 new messages
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="{{ asset('backend/assets/img/messages-1.jpg') }}" alt="" class="rounded-circle">
                            <div>
                                <h4>Maria Hudson</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="{{ asset('backend/assets/img/messages-2.jpg') }}" alt="" class="rounded-circle">
                            <div>
                                <h4>Anna Nelson</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>6 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="{{ asset('backend/assets/img/messages-3.jpg') }}" alt="" class="rounded-circle">
                            <div>
                                <h4>David Muldon</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>8 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="dropdown-footer">
                        <a href="#">Show all messages</a>
                    </li>

                </ul>
                <!-- End Messages Dropdown Items -->

            </li> --}}

            {{-- Imagem do Usuários/Configuração da Conta --}}
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ !empty(Auth::user()->profile_photo_path) ? asset('upload/imagem_usuario/' . Auth::user()->profile_photo_path) : url('backend/assets/img/no_image.jpg') }}"
                        alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ Auth::user()->email }}</h6>
                        <span
                            class="text-muted"><small>{{ Carbon\Carbon::now()->format('d/m/Y H:m:s') }}</small></span>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{ route('user.profile') }}">
                            <i class="bx bx-user"></i>
                            <span>Minha Conta</span>
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <i class="bi bi-box-arrow-right text-danger"></i>
                            <span>Deslogar</span>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
    </nav>

</header>

<style>
    /* Button Ver Todas Notificações */
    .ver-todas-notificacoes {
        border: none;
        background: none;
        text-align: left;
    }

    .search-bar {
        position: relative;
    }

    .pesquisar {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: rgb(250, 245, 255);
        z-index: 999;
        border-radius: 8px;
        margin-top: 5px;
    }

    .pesquisar ul {
        list-style: none;
    }

    .pesquisar ul li a {
        font-size: 16px;
        font-family: "Poppins", sans-serif;
        font-weight: 600;
        margin-top: 15px;
        color: #7b84d6;
    }

    .pesquisar ul #fone {
        margin-top: 25px;
        margin-right: 10%;
        font-size: 12px;
        color: #45505b;
    }

    .pesquisar i {
        margin-right: 5px;
    }

</style>
