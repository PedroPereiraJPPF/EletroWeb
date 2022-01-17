<html lang = "pt-br">
    <head>
        <title>Quiz</title>
        <style>
            body{
                padding: 0px;
                border: 0px;
            }
            .corpo{
                margin: 0 auto 0 auto;
                background-color: rgb(22, 7, 134);
                border-radius:10px;
                height: auto;
                width: 30%;
                text-align:center;
            }
            .questão{
                width: 50%;
                height: auto;
                text-align:center;
            }
            #Butão{
                margin-top:5px;
            }
            .cor{
                color:rgb(167, 164, 164);
            }
        </style>
    </head>
    <body>
        <div class = "corpo">
            <form method = "POST" action = "{{ route('Registrar_Questão') }}">
                @csrf
                <h1>EW</h1>
                <input type="text" placeholder="insira a questão" class = "questão" name = "descrição"required><br>
                <label for = "eletricidade" class = "cor">eletricidade</label>
                <input type="radio" name = "materia" value = "eletricidade" id = "eletricidade" required><br>
                <label for = "eletronica" class = "cor">eletronica</label>
                <input type="radio" name = "materia" value = "eletronica" id = "eletronica" required><br>
                <input type="submit" id="Butão" Value="Registrar">
            </form>
            <a href = "http://localhost:8000"><input type="button" value = "tela inicial"></a>
        </div>
    </body>