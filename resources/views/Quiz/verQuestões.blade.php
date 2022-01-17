@php
    use App\Models\alternativa;
    use App\Models\questõe;
    use App\Models\Usuario;
    use Illuminate\Support\Facades\Auth;
@endphp
<html lang = "pt-br">
    <head>
        {{--Enviar automaticamente--}}
        <script>
            var sub = setTimeout(enviar, 40000);
            function enviar(){
                document.quizForm.submit();
            }
            function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;
            display.textContent = minutes + ":" + seconds;
            if (--timer < 0) {
            timer = duration;
            }
        }, 1000);
    }
        window.onload = function () {
        var duration = 39; // Converter para segundos
        display = document.querySelector('#timer'); // selecionando o timer
        startTimer(duration, display); // iniciando o timer
        };
        </script>
        <title>Quiz</title>
        <style>
            body{
                padding: 0px;
                border: 0px;
            }
            .corpo{
                margin: 0 auto 0 auto;
                background-color:#3e0770;
                color: white;
                border-radius:10px;
                height: auto;
                max-width: 30%;
                min-width: 20%;

            }
            .questão{
                margin: 0 auto 0 auto;
                background-color: lightgray;
                width:500px;
                height:auto;    
            }
            .descrição{
                margin: 0;
                border-bottom: 1px solid black;
                border-top: 1px solid black;
                background-color:#5c03af;
                height: auto;
                max-width: auto;
                min-width: 20%;
                text-align:center;
            }
            .alt{
                display:none;
            }
            #timer{
                margin: 0 auto 0 auto;
                height:20px;
                width:auto;
                border-top-left-radius:10px;
                border-top-right-radius:10px;
                background-color:rgb(56, 7, 102);
                color:white;
                text-align:center;
                line-height: 20px;
            }
            #acertos{
                background-color: blueviolet;
                border-radius: 30px;
                height: 80px;
                width: 100px;
                margin: 0 auto 0 auto;
                text-align:center;
                line-height: 50px;
            }
            .feedback{
                border: 1px solid blueviolet;
                margin: 0 auto 20px auto;
                width: 20%;
                height: auto;
                text-align: center;
                border-radius: 10px;
            }
            .feedbackFinal{
                border: 1px solid blueviolet;
                margin: 0 auto 20px auto;
                width: 20%;
                height: 10%;
                line-height: 30px;
                text-align: center;
                border-radius: 10px;
            }
            #bt{
                width: 50px;
                height: 30px;
                border-radius: 10px;
                background-color:blueviolet;
                color:white;
                opacity: 0.9;
            }
        </style>
    </head>
    <body>
        @php
        //funções
        function index($v, $f, $tt, $tt2){
            $id = auth::user()->id;
            $Usuario = Usuario::findOrFail($id);
            $acertosAnteriores = auth::user()->$tt;
            $errosAnteriores = auth::user()->$tt2;
            $Usuario->update(
            [
                $tt => $v+$acertosAnteriores,
                $tt2 => $f+$errosAnteriores
            ]);
            echo "<div class = 'feedbackFinal'>";
            echo "Acertou: ".$v."/5<br>";
            echo "<a href = 'http://localhost:8000/'><button id = 'bt'>Inicio</button></a>";
            echo "</div>";;
            exit;
            //header('Location:http://localhost:8000/');
            //exit;
        }
        //Variaveis
        $c = 0;
        $v = 0;
        $f = 0;
        $tipoQuiz = 0;
        $arrayId = [];
        $materiaAcertos = 0;
        $materiaErros = 0;
        //TipoQuiz
        if(isset($_GET['seleção'])){
        $tipoQuiz = $_GET['seleção'];   
        if($tipoQuiz == "eletricidade"){
            $materiaAcertos = "acertosEletricidade";
            $materiaErros = "errosEletricidade";
        }else if($tipoQuiz == "eletronica"){
            $materiaAcertos = "acertosEletronica";
            $materiaErros = "errosEletronica";
        }
        }
        //Contador
        if(isset($_GET['contador'])){
        $c = $_GET['contador'];
        }
         //feedback usuario
         if(isset($_GET['responder'])){
            $teste = $_GET['responder'];
            if($teste>0){
                echo "<div class = 'feedback'>";
                echo "Feedback da questão anterior: <br>";
                echo "<font color = 'green'>Parabens, você acertou</font><br>";
                echo "Questões respondidas: ".$c."/5<br>";
                echo "</div>";
                $v = $_GET['certas']+1;
                $f = $_GET['erradas'];
            }else{
                echo "<div class = 'feedback'>";
                echo "Feedback da questão anterior: <br>";
                echo "<font color = 'red'>voce errou</font><br>";
                echo "Questões respondidas: ".$c."/5<br>";
                echo "</div>";
                $v = $_GET['certas'];
                $f = $_GET['erradas']+1;
            }
        }
        //array com os ids já utilizados
        //quiz eletricidade
        if($c == 0){
            $questõe = questõe::where('materia', $tipoQuiz)
            ->get()->random(1);
        }else if($c == 1){
            //if funcional
            $arrayId = [$_GET['idQuestão']];
            $arrayId = json_encode($arrayId);
            $arrayIdDe = json_decode($arrayId, TRUE);
            $questõe = questõe::where('id', '!=', $arrayIdDe[0])->
            where('materia', $tipoQuiz)->get()->random(1);
        }else if($c == 2){
            //funcional
            $arrayIdDe = json_decode($_GET['idQuestão'], TRUE);
            array_push($arrayIdDe, $_GET['idQuestão1']);
            $arrayId = json_encode($arrayIdDe);
            $questõe = questõe::
            where('id', '!=', $arrayIdDe[0])->
            where('id', '!=', $arrayIdDe[1])->
            where('materia', $tipoQuiz)->get()->random(1);
        }else if($c == 3){
            //funcional
            $arrayIdDe = json_decode($_GET['idQuestão'], TRUE);
            array_push($arrayIdDe, $_GET['idQuestão1']);
            $arrayId = json_encode($arrayIdDe);
            $questõe = questõe::
            where('id', '!=', $arrayIdDe[0])->
            where('id', '!=', $arrayIdDe[1])->
            where('id', '!=', $arrayIdDe[2])->
            where('materia', $tipoQuiz)->get()->random(1);
        }else if($c == 4){
            //funcional
            $arrayIdDe = json_decode($_GET['idQuestão'], TRUE);
            array_push($arrayIdDe, $_GET['idQuestão1']);
            $arrayId = json_encode($arrayIdDe);
            $questõe = questõe::
            where('id', '!=', $arrayIdDe[0])->
            where('id', '!=', $arrayIdDe[1])->
            where('id', '!=', $arrayIdDe[2])->
            where('id', '!=', $arrayIdDe[3])->
            where('materia', $tipoQuiz)->get()->random(1);
        }else if($c == 5){
            //funcional
            $arrayIdDe = json_decode($_GET['idQuestão'], TRUE);
            array_push($arrayIdDe, $_GET['idQuestão1']);
            $arrayId = json_encode($arrayIdDe);
            index($v, $f, $materiaAcertos, $materiaErros);
        }      
        @endphp
        <div class = "corpo">
            {{--Codigo das questões--}}
            <div id = "timer"></div>
            @foreach ($questõe as $key => $questõe)
            <div class = "descrição">
                {{$questõe->descrição}}<br>
                {{--id das questões em um array--}}
                </div>
                {{--alternativas--}}
                <label class = "alt">{{$alternativa = alternativa::all()->where('questao_id', $questõe->id)}}</label>
                @foreach ($alternativa as $key => $alternativa)
                <form method = "get" action = "" name = "quizForm">
                {{--valor alternativas--}}
                 <input type="radio" id= "{{$key}}" name="responder" value="{{$alternativa->correta}}">
                 <label for= "{{$key}}">{{$alternativa->descrição}}</label><br>
                 @endforeach
                 {{--preencher valores array de ids--}}
                 @php
                    if($c == 0){
                        // if funcional
                        echo "<input type = 'hidden' name = 'idQuestão' value = '$questõe->id'>";
                    }else if($c == 1){
                        //funcional
                        echo "<input type = 'hidden' name = 'idQuestão' value = $arrayId>";
                        echo "<input type = 'hidden' name = 'idQuestão1' value = $questõe->id>";
                    }else if($c == 2){
                        echo "<input type = 'hidden' name = 'idQuestão' value = $arrayId>";
                        echo "<input type = 'hidden' name = 'idQuestão1' value = $questõe->id>";
                    }else if($c == 3){
                        echo "<input type = 'hidden' name = 'idQuestão' value = $arrayId>";
                        echo "<input type = 'hidden' name = 'idQuestão1' value = $questõe->id>";
                    }else if($c == 4){
                        echo "<input type = 'hidden' name = 'idQuestão' value = $arrayId>";
                        echo "<input type = 'hidden' name = 'idQuestão1' value = $questõe->id>";
                    }
                    $c++;
                 @endphp
                 <input type = "hidden" name = "certas" value = "{{$v}}">
                 <input type = "hidden" name = "erradas" value = "{{$f}}">
                 <input type = "hidden" name = "contador" value = "{{$c}}">
                 <input type = "hidden" name = "seleção" value = "{{$tipoQuiz}}">
                 <input type = "submit">
                </form>    
            @endforeach
        </div>
    </body>
</html>