<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CadastroController extends Controller
{
    public function Index()
    {
        return view('cadastro');
    }

    public function pegarCEP(Request $request)
    {
        // Usar ViaCep por meio de AJAX e retornar dados
        // https://viacep.com.br/ws/01001000/json/
        // cepDigitado
        $cepDigitado = $request->cepDigitado;
        if (empty($dadosViaCep = Http::get("https://viacep.com.br/ws/$cepDigitado/json/")->json())) return response("Cep Inválido", 422);

        // se nao estiver 'setado' retorna vazio
        return response()->json([
            'cepDigitado' => $cepDigitado,
            'logradouro'  => isset($dadosViaCep['logradouro']) ? $dadosViaCep['logradouro'] : '',
            'localidade'  => isset($dadosViaCep['localidade']) ? $dadosViaCep['localidade'] : '',
            'bairro'      => isset($dadosViaCep['bairro'])     ? $dadosViaCep['bairro']     : '',
            'uf'          => isset($dadosViaCep['uf'])         ? $dadosViaCep['uf']         : ''
        ]);
    }
}
