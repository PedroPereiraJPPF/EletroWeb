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
            height: 350px;
            text-align: center;
            border: 1px solid blueviolet;
            border-radius: 50px;
            margin: 4% auto 0 auto;
            line-height: 50px;
        }
    </style>
</head>

<body>
    <div id="Corpo">
        <h1>EW</h1>
        @php
        $Nome = "{$Usuario -> Nome}";    
        $Email = "{$Usuario -> Email}";
        $Ano = "{$Usuario -> Ano}";
        $Tipo = "{$Usuario -> TipoUser}";
        echo "Nome: ".$Nome."<br>";
        echo "Tipo De Conta: ".$Tipo."<br>";
        echo "Email: ".$Email."<br>";
        echo "Ano de entrada no Campus: ".$Ano."<br>";
        @endphp
        <!--<a href = "http://localhost:8000"><button>Tela inicial</button></a>-->
        <button onclick="voltar()">voltar</button>
        <script>
            function voltar() {
            window.history.go(-1);
            }
        </script> 
    </div>
    @if ($Tipo == "professor")
        
    @endif
</body>

</html>