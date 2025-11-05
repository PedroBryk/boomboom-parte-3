@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bem-vindo, Administrador!</h1>
    <p>Essa é a sua página inicial.</p>

    <a href="{{ route('aluno.home') }}">Gerenciar Alunos</a>
    <a href="{{ route('professor.home') }}">Gerenciar Professores</a>
    <a href="{{ route('treinos.index') }}">Ver Treinos</a>
    <a href="{{ route('aulas.index') }}">Ver Aulas</a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Sair</button>
    </form>
</div>

<div class="container">
        <h1>Lista de Alunos</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Data de Nascimento</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alunos as $aluno)
                    <tr>
                        <td>{{ $aluno->nome }}</td>
                        <td>{{ $aluno->email }}</td>
                        <td>{{ $aluno->telefone }}</td>
                        <td>{{ $aluno->data_nascimento }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
