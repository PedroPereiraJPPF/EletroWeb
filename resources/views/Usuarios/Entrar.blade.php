<html lang = "pt-br">

<head>
    <title>Registro</title>
    <style>
        body {
            margin: 0px;
            padding: 0px;
        }
        .Logo
        {
            color: Blue;
        }
        #Corpo {
            width: 400px;
            height: 350px;
            text-align: center;
            border: 1px solid blueviolet;
            border-radius: 50px;
            margin: 4% auto 0 auto;
            line-height: 50px;

        }
        #Posição{
            border-top:30px;
        }

        .Nome {
            border: 0;
            margin:0;
            border-bottom: 2px solid;
            margin-top: 10px;
            border-radius: 5px;
            background-color: #C4C4C4;
            height: 40px;
            width: 260px;
        }
        #Butão {
            margin: 30px 10px 10px 10px;
        }
    </style>
</head>

<body>
    <div id="Corpo">
    <!--impede o redirecionamento da pagina-->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--imprimir erro ao redirecionar-->
        @if (session('danger'))
            <div class = "alert alert-danger">
                {{session('danger')}}
            </div>
        @endif
        <!--Formulario login-->
        <form method = "POST" action = "{{ route('Entrar') }}">
            @csrf
            <h1 class = "Logo">EW</h1>
            <div id = "Posição">
            <input type="email" class="Nome" Name = "Email" placeholder = "Email"><br>
            <input type="password" class="Nome" placeholder="Senha" name = "password"><br>
            <button id = "Butão" type = "submit">Entrar</button><br>
            </div>
        </form>
            Não possui uma conta?<a href = 'http://localhost:8000/Usuario'>Clique aqui</a><br>
    </div>
</body>

</html>