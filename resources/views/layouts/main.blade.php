@php
    use App\Models\Usuario;
    use Illuminate\Support\Facades\Auth;
@endphp
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EletroWeb</title>
    <link rel="stylesheet" href="/css/home.css">
</head>
<body>
    <header id="cabeçalho">
        <h1 id = "logo">EW</h1>
            <nav id = 'menu'>
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
        </header>
        {{-- conteudo principal --}}
        @yield('content');
        <footer>

        </footer>
</body>
</html>