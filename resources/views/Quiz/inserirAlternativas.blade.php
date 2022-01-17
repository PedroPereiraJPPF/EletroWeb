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
            .oculto{
                display:none;
            }
            label{
                color:white;
            }
        </style>
    </head>
    <body>
        <div class = "corpo">
            <form method = "POST" action = "{{route('Registrar_alternativas')}}">
                @csrf
                <h1>EW</h1>
                {{-- alternativa 1 --}}
                <input type="text" placeholder="insira a alternativa" class = "questão" name = "descrição"required><br>
                <label>A alternativa é verdadeira?</label><br>
                <input type="radio" name = "correta" value = "1">
                <label for="correta">Sim</label><br>
                <input type="radio" name = "correta" value = "0">
                <label for="F">Não</label><br>
                <input type="checkbox" name = "questao_id" value = "{{$id}}" class = "oculto" checked>
                {{--Inserir--}}
                <input type="checkbox" name = "questao_id" value = "{{$id}}" class = "oculto" checked>
                <input type="submit" id="Butão" Value="enviar">
            </form>
                <a href = "http://localhost:8000/Quest%C3%A3o"><input type="button" value = "voltar"></a>
        </div>
    </body>