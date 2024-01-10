<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function Index()
    {
        return view('cadastro');
    }

    // Usar ViaCep por meio de AJAX e retornar dados
    public function pegarCEP(Request $request)
    {
        // https://viacep.com.br/ws/01001000/json/
        dd($request->all());
    }
}
