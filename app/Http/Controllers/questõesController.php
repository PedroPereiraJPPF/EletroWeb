<?php

namespace App\Http\Controllers;

use App\Models\alternativa;
use App\Models\questõe;
use Illuminate\Http\Request;

class questõesController extends Controller
{
    //inserir quetões
    public function create()
    {
        return view('Quiz.inserirQuestões');
    }
    public function store(Request $request)
    {
        $questõe = questõe::create([
            'descrição' => $request->descrição,
            'materia' => $request->materia
        ]);
        return view('Quiz.inserirAlternativas', ['id' => $questõe->id]);
    }

    //Ver
    public function show()
    {
        //$idQuestão = questõe::all();
        //$alternativa = alternativa::all();
        $questõe = questõe::all()->random(1);
        return view('Quiz.verQuestões', [
            'questõe' => $questõe
        ]);
    }
    //Excluir
    public function delete($id)
    {
        $questõe = questõe::findOrFail($id);
        return view('Quiz.excluirQuestões', ['questõe' => $questõe]);
    }
    public function destroy($id)
    {
        $questõe = questõe::findOrFail($id);
        $questõe->delete();
        // return view('Usuarios.Home');
        return "Questão excluida";
    }
}
