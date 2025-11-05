@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bem-vindo, Professor!</h1>
    <p>Essa é a sua página inicial.</p>

    <a href="{{ route('aulas.index') }}">Ver Aulas</a>
    <a href="{{ route('treinos.index') }}">Ver Treinos</a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Sair</button>
    </form>
</div>
@endsection
