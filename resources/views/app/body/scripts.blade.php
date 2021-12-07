    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    {{-- Pesquisar Alunos com JQuery --}}
    <script src="{{ asset('backend/assets/js/main_search_alunos.js') }}"></script>

    <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/echarts/echarts.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>   

    {{-- Esconder a Tela de Pesquisa quando clicar fora --}}
    <script>
        function esconder() {
            $("#pesquisarAlunos").slideUp();
            
        }

        function mostrar() {
            $("#pesquisarAlunos").slideDown();

        }
    </script>
    