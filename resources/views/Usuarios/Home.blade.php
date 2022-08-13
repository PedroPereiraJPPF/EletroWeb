@extends('layouts.main')

@section('title', 'EletroWeb')

@section('content')
<link rel="stylesheet" href="/css/home.css">
<section id = "corpo">
    @auth
        <form method = "GET" action ="Questão/Ver">
            <h1>Bem vindo ao EletroWeb</h1><br>
            <h3>Selecione a materia que deseja: </h3><br>
            <label for = "campo1">Eletricidade</label>
            <input type = "radio" value = "eletricidade" name = "seleção" id = "campo1" class = "marcar" required><br>
            <label for = "campo2">Eletrônica</label>
            <input type = "radio" value = "eletronica" name = "seleção" id = "campo2" class = "marcar" required><br>
            <button name = "testar" id = "Quiz">Quiz</button>
        </form>
    @endauth
    @guest
        <p>Conheça EletroWeb um site desenvolvido por alunos</p>
        <br>
        <p>Faça parte da nossa plataforma</p>
        <a href = "http://localhost:8000/Usuario"><button id = "botão">Bem vindo</button></a>
    @endguest
</section>

@endsection