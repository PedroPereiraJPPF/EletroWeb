<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function create()
    {
        return view('Usuarios.Registrar');
    }
    #Fazer registro
    public function store(Request $request)
    {
        Usuario::create([
            'Nome' => $request->Nome,
            'Email' => $request->Email,
            'password' => bcrypt($request->password),
            'Ano' => $request->Ano,
            'TipoUser' => $request->TipoUser
        ]);
        return redirect()->route('fazer login');
    }
    #Mostrar dados do usuario
    public function show()
    {
        $id = auth::user()->id;
        $Usuario = Usuario::FindOrFail($id);
        return view('Usuarios.Mostrar', ['Usuario' => $Usuario]);
    }
    #Mostrar dados para edição
    public function edit()
    {
        $id = auth::user()->id;
        $Usuario = Usuario::FindOrFail($id);
        return view('Usuarios.Editar', ['Usuario' => $Usuario]);
    }
    #atualizar os dados
    public function update(Request $request)
    {
        $id = auth::user()->id;
        $Usuario = Usuario::FindOrFail($id);
        $Usuario->Update([
            'Nome' => $request->Nome,
            'Email' => $request->Email
        ]);
        return redirect()->route('tela inicial');
    }
    #inicio login
    public function enter()
    {
        return view('Usuarios.Entrar');
    }
    #Realizar login/imprimir erro
    public function auth(Request $request)
    {
        $this->validate($request, [
            'Email' => 'required',
            'password' => 'required'
        ], [
            'Email.required' => 'Insira um email valido',
            'password.required' => 'Insira uma senha'
        ]);

        if (auth::attempt(['Email' => $request->Email, 'password' => $request->password])) {
            $id = auth::user()->id;
            $Usuario = Usuario::FindOrFail($id);
            return view('Usuarios.Home', ['Usuario' => $Usuario]);
        } else {
            return redirect()->back()->with('danger', 'Email ou senha invalida');
        }
    }
    #Logout
    public function logout(Request $request)
    {
        auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    #Grafico
    public function grafico()
    {
        $id = 1;
        $Usuario = Usuario::findOrFail($id);
        return view('Usuarios.grafico', ['Usuario' => $Usuario]);
    }
}
