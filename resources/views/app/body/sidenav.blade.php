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
                <i class="bx bx-user fs-5"></i><span>Treinos</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="montarTreino" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('montar.index') }}">
                        <i class="bi bi-circle"></i><span>Montar Treino Personal</span>
                    </a>
                </li>
            </ul>
        </li>  

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
            <a class="nav-link collapsed" data-bs-target="#profile" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Cálculos</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="profile" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="charts-apexcharts.html">
                        <i class="bi bi-circle"></i><span>IMC</span>
                    </a>
                </li>
                <li>
                    <a href="charts-apexcharts.html">
                        <i class="bi bi-circle"></i><span>Atualizar Senha</span>
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

        {{-- Exercios do Treino --}}
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Exercicios</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="charts-chartjs.html">
                        <i class="bi bi-circle"></i><span>Adicionar Exercícios</span>
                    </a>
                </li>
                <li>
                    <a href="charts-apexcharts.html">
                        <i class="bi bi-circle"></i><span>Todos os Exercícios</span>
                    </a>
                </li>
            </ul>
        </li> --}}

        {{-- ======================================================================================================= --}}
        {{-- <li class="nav-heading">Template</li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Alerts</span>
                    </a>
                </li>
                <li>
                    <a href="components-accordion.html">
                        <i class="bi bi-circle"></i><span>Accordion</span>
                    </a>
                </li>
                <li>
                    <a href="components-badges.html">
                        <i class="bi bi-circle"></i><span>Badges</span>
                    </a>
                </li>
                <li>
                    <a href="components-breadcrumbs.html">
                        <i class="bi bi-circle"></i><span>Breadcrumbs</span>
                    </a>
                </li>
                <li>
                    <a href="components-buttons.html">
                        <i class="bi bi-circle"></i><span>Buttons</span>
                    </a>
                </li>
                <li>
                    <a href="components-cards.html">
                        <i class="bi bi-circle"></i><span>Cards</span>
                    </a>
                </li>
                <li>
                    <a href="components-carousel.html">
                        <i class="bi bi-circle"></i><span>Carousel</span>
                    </a>
                </li>
                <li>
                    <a href="components-list-group.html">
                        <i class="bi bi-circle"></i><span>List group</span>
                    </a>
                </li>
                <li>
                    <a href="components-modal.html">
                        <i class="bi bi-circle"></i><span>Modal</span>
                    </a>
                </li>
                <li>
                    <a href="components-tabs.html">
                        <i class="bi bi-circle"></i><span>Tabs</span>
                    </a>
                </li>
                <li>
                    <a href="components-pagination.html">
                        <i class="bi bi-circle"></i><span>Pagination</span>
                    </a>
                </li>
                <li>
                    <a href="components-progress.html">
                        <i class="bi bi-circle"></i><span>Progress</span>
                    </a>
                </li>
                <li>
                    <a href="components-spinners.html">
                        <i class="bi bi-circle"></i><span>Spinners</span>
                    </a>
                </li>
                <li>
                    <a href="components-tooltips.html">
                        <i class="bi bi-circle"></i><span>Tooltips</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="forms-elements.html">
                        <i class="bi bi-circle"></i><span>Form Elements</span>
                    </a>
                </li>
                <li>
                    <a href="forms-layouts.html">
                        <i class="bi bi-circle"></i><span>Form Layouts</span>
                    </a>
                </li>
                <li>
                    <a href="forms-editors.html">
                        <i class="bi bi-circle"></i><span>Form Editors</span>
                    </a>
                </li>
                <li>
                    <a href="forms-validation.html">
                        <i class="bi bi-circle"></i><span>Form Validation</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="tables-general.html">
                        <i class="bi bi-circle"></i><span>General Tables</span>
                    </a>
                </li>
                <li>
                    <a href="tables-data.html">
                        <i class="bi bi-circle"></i><span>Data Tables</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="charts-chartjs.html">
                        <i class="bi bi-circle"></i><span>Chart.js</span>
                    </a>
                </li>
                <li>
                    <a href="charts-apexcharts.html">
                        <i class="bi bi-circle"></i><span>ApexCharts</span>
                    </a>
                </li>
                <li>
                    <a href="charts-echarts.html">
                        <i class="bi bi-circle"></i><span>ECharts</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Icons</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-contact.html">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-login.html">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-error-404.html">
                <i class="bi bi-dash-circle"></i>
                <span>Error 404</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-blank.html">
                <i class="bi bi-file-earmark"></i>
                <span>Blank</span>
            </a>
        </li> --}}

    </ul>

</aside>
