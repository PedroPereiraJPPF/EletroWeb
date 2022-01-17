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
            color: Blue;
        }
        #Corpo {
            width: 400px;
            height: 500px;
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
            margin-top: 30px;
            margin-left: 10px;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div id="Corpo">
        <form method = "POST" action = "{{ route('Alterar_Usuario', ['id' => $Usuario ->id]) }}">
            @csrf
            <h1>EW</h1>
            <input type="text" class="Nome" placeholder="Nome" name = "Nome" value = "{{$Usuario -> Nome }}"><br>
            <input type="email" class="Nome" Name = "Email" placeholder = "Email" value = "{{$Usuario -> Email }}"><br><br>
            <button id = "Butão">Editar</button>
        </form>
        <button onclick="voltar()">voltar</button>
        <script>
            function voltar() {
            window.history.go(-1);
            }
        </script>
    </div>
</body>

</html>