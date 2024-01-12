<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    //
    public function Index(string $idFilme)
    {
        // chave 20f281a282ef9ecf0f39fdbd326ee9a4
        // 'https://api.themoviedb.org/3/movie/11?api_key=20f281a282ef9ecf0f39fdbd326ee9a4
        // trazer dados filme


        $dadosFilme = Http::withToken(
            'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyMGYyODFhMjgyZWY5ZWNmMGYzOWZkYmQzMjZlZTlhNCIsInN1YiI6IjY1YTA0NmY5NDRlYTU0MDEyZTJkYmM4YSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.KM3N1vTCHNHKoY68_yrdhIK7tsfRm1RwSti0HEDvfTc'
        )->get("https://api.themoviedb.org/3/movie/$idFilme?language=pt-BR")->json();

        return response()->json([
            "idDoFilme"             => $dadosFilme['id'],
            "nomeDoFilme"           => $dadosFilme['original_title'],
            "sinopseDoFilme"        => $dadosFilme['overview'],
            "avaliacaoDosUsuarios"  => $dadosFilme['vote_average'],
            "anoLancamento"         => $dadosFilme['release_date'],
            "cartazFilme"           => $dadosFilme['poster_path'],
        ]);
    }
}
