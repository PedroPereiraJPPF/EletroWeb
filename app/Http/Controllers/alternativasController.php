<?php

namespace App\Http\Controllers;

use App\Models\alternativa;
use Illuminate\Http\Request;

class alternativasController extends Controller
{
    public function create()
    {
        return view('Quiz.inserirAlternativas');
    }
    public function store(Request $request)
    {
        $alt = alternativa::create(
            [
                'descrição' => $request->descrição,
                'correta' => $request->correta,
                'questao_id' => $request->questao_id
            ]
        );
        return view('Quiz.inserirAlternativas', ['id' => $alt->questao_id]);
        //return redirect()->route('inserir_questões');
    }
}
