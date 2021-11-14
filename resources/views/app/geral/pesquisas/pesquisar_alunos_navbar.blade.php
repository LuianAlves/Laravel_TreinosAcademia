
@if ($alunos -> isEmpty())
<ul style="margin-top: 10px;">
    <li><a href="#">Nenhum Aluno Encontrado</a></li>
</ul>
@else
    <ul>
        @foreach($alunos as $aluno)
            <li class="d-flex justify-content-between"> 
                <a href="{{ route('montado.index', $aluno->id) }}">{{ $aluno->nome }} </a>
                <a href="{{ route('montado.index', $aluno->id) }}" id="fone"><i class="bx bx-phone text-success"></i>{{ $aluno->telefone }}</a>
            </li>
        @endforeach
    </ul>
@endif