@php
    use App\Models\Usuario;
    use Illuminate\Support\Facades\Auth;
@endphp
<html lang = "pt-br">
<head>
    <title>EletroWeb</title>
    <style>
        body 
        {
        margin: 0px;
        padding: 0px;
        background-image: url("bg.jpg");
        }
        h1
        {
        display:inline-block;
        color:blueviolet;
        }
        #cabeçalho
        {
        height: 80px;
        line-height:center;
        border-bottom: 1px solid blueviolet;
        }
        #menu
        {
        position:relative;
        bottom:50px;
        }
        #cabeçalho #menu
        {
        text-align:right;
        }
        #menu ul 
        {
        padding:0px;
        margin:0px;
        list-style:none;
        }
        #menu ul li 
        { 
        display: inline;
        }
        #menu ul li a {
        padding: 2px 10px;
        display: inline-block;
        color: #333;
        text-decoration: none;
        }
        #menu ul li a:hover {
        background-color:#D6D6D6;
        color: black;
        border-bottom:3px solid blueviolet;
        }
        #corpo{
            margin: 0 auto 0 auto;
            text-align:center;
            width: auto;
            height: 566px;
        }
        #botão{
            background-color:blueviolet;
            color: white;
            border-radius: 5px;
            height: 5%;
            width: 6%;
            position: relative;
            top:20px;
        }
        h3{
            margin: 0px;
            padding: 0px;
        }
        .marcar{
            margin: 10px 0px 0px 0px;
        }
        #Quiz{
            background-color: blueviolet;
            color: lightgray;
            margin: 10px 0 0 0;
            border-radius: 10px;
            height: 40px;
            width: 80px;
            opacity: 0.9;
        }
    </style>
</head>

<body>
    {{--Cabeçalho--}}
    <div id="cabeçalho">
            @csrf
            <h1 id = "logo">EW</h1>
                <nav id = 'Menu'>
                <ul>
                    @guest
                <li><a href = 'http://localhost:8000/Usuario'>Registrar</a></li>
                <li><a href = 'http://localhost:8000/Entrar'>Entrar</a></li>
                    @endguest
                    @auth
                    <li><a href = 'http://localhost:8000/Usuario/Ver'>perfil</a></li>
                    <li><a href = 'http://localhost:8000/Usuario/Editar'>editar</a></li>
                    @php
                        $id = auth::user()->id;
                        $Usuario = Usuario::findOrFail($id);
                        $test = "{$Usuario -> TipoUser}";
                        if($test == "professor"){
                        echo "<li><a href = 'http://localhost:8000/Quest%C3%A3o'>inserir Questão</a></li>";
                        }
                    @endphp
                    <li><a href = 'http://localhost:8000/logout'>Sair</a></li>
                    @endauth
                </ul>
    </div>
    {{--Corpo da pagina--}}
    <div id = "corpo">
        @auth
        {{--<a href = "http://localhost:8000/Quest%C3%A3o/Ver"><button id = "botão">Quiz</button></a>--}}
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
    </div>
    {{--Rodape--}}
    <div id = "rodape">


    </div>
</body>

</html>