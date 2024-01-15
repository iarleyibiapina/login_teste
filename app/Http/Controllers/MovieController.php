<?php

namespace App\Http\Controllers;

use App\Models\MovieModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    /**
     *  Função apenas para testar conexão e busca de filmes direto da api
     * 
     * @param int $idFilme - id do filme a ser buscado no theMovieDb
     */
    public function searchFilmeApi(string $idFilme)
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


    public function storeFilme(string $idFilme)
    {
        /**
         *  Armazenar filme no banco e redireciona para home
         * 
         * @param int $idFilme - Id do filme (com base no theMovieDb) a ser armazenado
         */
        $dadosFilme = Http::withToken(
            'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyMGYyODFhMjgyZWY5ZWNmMGYzOWZkYmQzMjZlZTlhNCIsInN1YiI6IjY1YTA0NmY5NDRlYTU0MDEyZTJkYmM4YSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.KM3N1vTCHNHKoY68_yrdhIK7tsfRm1RwSti0HEDvfTc'
        )->get("https://api.themoviedb.org/3/movie/$idFilme?language=pt-BR")->json();

        // tratando a imagem
        // link para local de imagens o file_path da consulta já adiciona a /
        $url = "https://image.tmdb.org/t/p/original";
        // consumindo api, trazendo 3 categorias de imagens e o nome do arquivo.
        $bancoImagens = Http::withToken(
            'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyMGYyODFhMjgyZWY5ZWNmMGYzOWZkYmQzMjZlZTlhNCIsInN1YiI6IjY1YTA0NmY5NDRlYTU0MDEyZTJkYmM4YSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.KM3N1vTCHNHKoY68_yrdhIK7tsfRm1RwSti0HEDvfTc'
        )->get("https://api.themoviedb.org/3/movie/$idFilme/images")->json();

        // pegando a primeira imagem do array de imagens na 'pasta' 'logos' ou cartaz
        $idImagem = $bancoImagens["logos"][0]['file_path'];

        // unindo a url e o nome da imagem.
        $pathDefinitivo = $url . $idImagem;

        // file_put_content - adiciona dados ao arquivo
        // 1param - caminho a ser salvo
        // 2param - data
        // 3param - flag (opcional)
        // pegando conteudo da imagem
        $imagemConteudo = file_get_contents($pathDefinitivo);
        // retirando a / do começo
        $filtroNomeImagem = str_replace("/", "", $idImagem);
        // salvando com nome do filme e time() 
        $nomeImagem = $dadosFilme['original_title'] . "_" . time() . "_" . $filtroNomeImagem;
        $localPath = public_path('img/' . $nomeImagem);
        file_put_contents($localPath, $imagemConteudo);

        // salvando novo caminho imagem
        MovieModel::create([
            "id_filme_themovie_tfi"     => $dadosFilme['id'],
            "nome_filme_tfi"            => $dadosFilme['original_title'],
            "sinopse_filme_tfi"         => $dadosFilme['overview'],
            "avaliacao_filme_tfi"       => $dadosFilme['vote_average'],
            "data_lancamento_filme_tfi" => $dadosFilme['release_date'],
            "path_filme_tfi"            => $localPath,
        ]);

        return redirect('/');
    }

    public function getFilme(string $idFilme)
    {
        /** 
         * Retorna dados do filme 
         * 
         * @param int $idFilme - Id do filme com base no id do themoviedb
         */

        $filme = MovieModel::where('id_filme_themovie_tfi', $idFilme)->get()->first();

        return response()->json([
            "idDoFilme"             => $filme->id_filme_themovie_tfi,
            "nomeDoFilme"           => $filme->nome_filme_tfi,
            "sinopseDoFilme"        => $filme->sinopse_filme_tfi,
            "avaliacaoDosUsuarios"  => $filme->avaliacao_filme_tfi,
            "anoLancamento"         => $filme->data_lancamento_filme_tfi,
            "cartazFilme"           => $filme->path_filme_tfi,
        ]);
    }
}
