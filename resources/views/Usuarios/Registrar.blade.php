<html lang = "pt-br">

<head>
    <title>Registro</title>
    <style>
        body {
            margin: 0px;
            padding: 0px;
        }
        h1
        {
            color: blueviolet;
        }
        #Corpo {
            width: 400px;
            height: 550px;
            text-align: center;
            border: 1px solid;
            border-radius: 50px;
            margin: 4% auto 0 auto;
            line-height: 50px;
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
            margin: 15px 10px 0 10px;
        }
        .rd{
            margin: 0px;
            padding:0px;

        }
    </style>
</head>

<body>
    <div id="Corpo">
        <form method = "POST" action = "{{ route('Registrar_Usuario') }}">
            @csrf
            <h1>EW</h1>
            <input type="text" class="Nome" placeholder="Nome" name = "Nome" id = "Nome" required><br>
            <input type="email" class="Nome" Name = "Email" placeholder = "Email" id = "Email" required><br>
            <input type="password" class="Nome" placeholder="Senha" name = "password" id = "password" required><br>
            Digite seu ano de entrada:<br>
            <input type = "number" class = "Nome" name = "Ano" id = "Ano" required><br>
            Selecione seu tipo de conta<br>
            <label for = "aluno">Aluno</label>
            <input type = "radio" name = "TipoUser" id="aluno" value = "aluno" class = "rd" required> 
            <label for = "professor">Professor</label>
            <input type = "radio" name = "TipoUser" id="professor" value = "professor" class = "rd" required><br> 
            <input type="submit" id="Butão" Value="Registrar"><br>
            já possui uma conta?<a href = "http://localhost:8000/Entrar">clique aqui</a>
        </form>
    </div>
</body>

</html>