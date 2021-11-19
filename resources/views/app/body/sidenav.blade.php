<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-heading">Área do Aluno</li>

        {{-- Alunos --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#alunos" data-bs-toggle="collapse" href="#">
                <i class="bx bx-user fs-5"></i><span>Alunos</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="alunos" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('alunos.index') }}">
                        <i class="bi bi-circle"></i><span>Listagem de Alunos</span>
                    </a>
                </li>
                <li>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#createAluno">
                        <i class="bi bi-circle"></i><span>Novo Aluno</span>
                    </a>
                </li>
            </ul>
        </li>   

        {{-- Treino dos Alunos --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#montarTreino" data-bs-toggle="collapse" href="#">
                <i class="bx bx-dumbbell fs-5"></i><span>Treinos</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="montarTreino" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('montar.index') }}">
                        <i class="bi bi-circle"></i><span>Montar Treino Personal</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('montar.index') }}">
                        <i class="bi bi-circle"></i><span>Montar Treino Assessoria</span>
                    </a>
                </li>
            </ul>
        </li> 

        {{-- Avaliação Física --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#avaliacaoFisica" data-bs-toggle="collapse" href="#">
                <i class="bx bx-heart fs-5"></i><span>Avaliação Física</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="avaliacaoFisica" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('avaliacoes.index') }}">
                        <i class="bi bi-circle"></i><span>Listagem de Alunos</span>
                    </a>
                </li>
            </ul>
        </li>  

        {{-- Montar Contrato de Alunos --}}
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#montarContrato" data-bs-toggle="collapse" href="#">
                <i class="bx bx-file fs-5"></i><span>Contratos</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="montarContrato" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('montar.index') }}">
                        <i class="bi bi-circle"></i><span>Montar Contrato</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('montar.index') }}">
                        <i class="bi bi-circle"></i><span>Contratos Montados</span>
                    </a>
                </li>
            </ul>
        </li>   --}}

        <li class="nav-heading">Configurar Treinos</li>

        {{-- Categoria de Treino --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#categoriaTreino" data-bs-toggle="collapse" href="#">
                <i class="bx bx-category-alt fs-5"></i><span>Categorias de Treino</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="categoriaTreino" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('categoria.index') }}">
                        <i class="bi bi-circle"></i><span>Listagem de Categorias</span>
                    </a>
                </li>
                <li>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#createCategoriaTreino">
                        <i class="bi bi-circle"></i><span>Adicionar Categoria</span>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Exercicios do Treino --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#exercicioTreino" data-bs-toggle="collapse" href="#">
                <i class="bx bx-dumbbell fs-5"></i><span>Exercícios</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="exercicioTreino" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('exercicio.index') }}">
                        <i class="bi bi-circle"></i><span>Listagem de Exercícios</span>
                    </a>
                </li>
                <li>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#createExercicioTreino">
                        <i class="bi bi-circle"></i><span>Adicionar Exercício</span>
                    </a>
                </li>
            </ul>
        </li>

        {{-- <li class="nav-heading">Configurar Avaliação Física</li> --}}

        {{-- Categoria de Treino --}}
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#calculosAvaliacao" data-bs-toggle="collapse" href="#">
                <i class="bx bx-category-alt fs-5"></i><span>Cálculos</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="calculosAvaliacao" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('categoria.index') }}">
                        <i class="bi bi-circle"></i><span>Anamnese</span>
                    </a>
                </li>
            </ul>
        </li> --}}

        <li class="nav-heading">Configurar Contrato</li>

        {{-- Contrato --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#modeloContrato" data-bs-toggle="collapse" href="#">
                <i class="bx bxs-file fs-5"></i><span>Contrato</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="modeloContrato" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('dados-professores.index') }}">
                        <i class="bi bi-circle"></i><span>Dados dos Professores</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-heading">Pagamentos</li>

        {{-- Pagamentos --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#pgtGeral" data-bs-toggle="collapse" href="#">
                <i class="bx bx-dollar fs-5"></i><span>Pagamentos</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="pgtGeral" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('pagamentos.geral.todos') }}">
                        <i class="bi bi-circle"></i><span>Todos os Pagamentos</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pagamentos.todos.pendentes') }}">
                        <i class="bi bi-circle"></i><span>Pagamentos Pendentes</span>
                    </a>
                </li>
            </ul>
        </li>

    {{-- <li class="nav-heading">Configurações da Conta</li> --}}

        {{-- Configurações da Conta --}}
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#profile" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Minha Conta</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="profile" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="charts-apexcharts.html">
                        <i class="bi bi-circle"></i><span>Atualizar Informações</span>
                    </a>
                </li>
            </ul>
        </li>  --}}

        <li class="nav-heading">EXTRA</li>

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('logout') }}">
                <i class="bx bx-voicemail fs-4 text-success"></i>
                <span class="text-success">Enviar Email</span>
            </a>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-right fs-5 text-danger"></i>
                <span class="text-danger">Deslogar</span>
            </a>
        </li>

    </ul>

</aside>
