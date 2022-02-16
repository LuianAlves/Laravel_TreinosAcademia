<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Exercicios de Treinos</title>
    
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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <style>
        #draggable {
            width: 150px;
            height: 150px;
            padding: 0.5em;
        }

    </style>
</head>

<body class="bg-light">

    <!-- Navbar Start-->
    @include('app.body.navbar')
    <!-- Navbar Ends -->

    <!-- Page Sidebar Start-->
    @include('app.body.sidenav')
    <!-- Page Sidebar Ends-->

    <main id="main" class="main">
        @yield('content_dragg')
    </main>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <!-- Scripts start-->
    @include('app.body.scripts')
    <!-- Scripts end -->

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(function() {
            $("#listaTreinoA, #listaTreinoB, #listaTreinoC, #listaTreinoD").sortable({
                connectWith: ".connectedSortable",
                opacity: 0.5,
            });

            $(".connectedSortable").on("sortupdate", function(event, ui) {
                var treino_a = [];
                var treino_b = [];
                var treino_c = [];
                var treino_d = [];

                $("#listaTreinoA tr").each(function(index) {
                    if ($(this).attr('data-id')) {
                        treino_a[index] = $(this).attr('data-id');
                    }
                });

                $("#listaTreinoB tr").each(function(index) {
                    if ($(this).attr('data-id')) {
                        treino_b[index] = $(this).attr('data-id');
                    }
                });

                $("#listaTreinoC tr").each(function(index) {
                    if ($(this).attr('data-id')) {
                        treino_c[index] = $(this).attr('data-id');
                    }
                });

                $("#listaTreinoD tr").each(function(index) {
                    if ($(this).attr('data-id')) {
                        treino_d[index] = $(this).attr('data-id');
                    }
                });

                $.ajax({
                    url: "{{ route('update.items') }}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        treino_a: treino_a, 
                        treino_b: treino_b,
                        treino_c: treino_c,
                        treino_d: treino_d,
                    },
                    success: function(data) {
                        console.log('success');
                    }
                });
    
            });
        });
    </script>
</body>

</html>
