<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta name="csrf-content" content="{{ csrf_token() }}">
    <meta content="" name="keywords">

    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    
    <!-- Favicons -->
    <link href="{{ asset('backend/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('backend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">

    {{-- Selicionar categorias do modal quando for montar treino --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    {{-- TREINOS ADICIONAR EXERCICO AO LADO DIREITO --}}
    <script src="{{ asset('backend/assets/js/arraylist_direita.js') }}" async></script>

</head>

<body>

    @auth
        <!-- Navbar Start-->
        @include('app.body.navbar')
        <!-- Navbar Ends -->

        <!-- Page Sidebar Start-->
        @include('app.body.sidenav')
        <!-- Page Sidebar Ends-->

        <!-- Index Page -->
        <main id="main" class="main">
            @yield('content')
        </main>
        <!-- Index Page Ends-->

        <!-- footer start-->
        @include('app.body.footer')
        <!-- end - footer start-->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Scripts start-->
        @include('app.body.scripts')
        <!-- Scripts end -->

        <!-- Include MODAL ALUNOS AJAX -->
        @include('app.alunos.modals.create_alunos')
        @include('app.alunos.modals.show_alunos')

        <!-- Include MODAL TREINOS->CATEGORIAS AJAX -->
        @include('app.treinos.categorias.modals.create_categoria_treinos')
        <!-- Include MODAL TREINOS->EXERCICIOS AJAX -->
        @include('app.treinos.exercicios.modals.create_exercicio')
    @endauth
</body>

</html>
