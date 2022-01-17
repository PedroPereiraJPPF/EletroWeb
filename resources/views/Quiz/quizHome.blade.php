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
                width: 50%;
            }
            .questão{
                margin: 0 auto 0 auto;
                background-color: lightgray;
                width:500px;
                height:auto;    
            }
        </style>
    </head>
    <body>
        <div class = "corpo">
            @php
              $questão = array("Questão 1", "Questão 2", "Questão 3");
            @endphp
            @foreach ($questão as $item)
                <div class = "questão">
                    @php
                    echo $item;
                    @endphp
                </div>
            @endforeach
        </div>
    </body>
</html>