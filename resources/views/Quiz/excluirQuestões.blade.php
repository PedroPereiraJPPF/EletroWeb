<html lang = "pt_br">
    <head>
        <title>Excluir Questão</title>
        <style></style>
    </head>
    <body>
        <form action = "{{ route('excluir_questão', ['id' => $questõe->id]) }}" method = "POST">
            @csrf
            <h6>Tem certeza que deseja excluir essa questão?</h6>
            <input type = "text" name = "descrição" value = "{{$questõe->descrição}}"><br>
            <button>Excluir</button>
            <a href = "http://localhost:8000"><button>Voltar</button></a>
        </form>
    </body>
</html>