<html>
    <head></head>
    <body>
        @php
            $v = $_GET['certas'];
            $f = $_GET['erradas'];
        @endphp
            <input type = "text" name = "certas" value = {{$v}} readonly>
            <input type = "text" name = "erradas" value = {{$f}} readonly>
    </body>
</html>