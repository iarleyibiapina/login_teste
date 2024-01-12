<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieModel extends Model
{
    use HasFactory;

    protected $table = "tab_filmes_tfi";

    protected $primarykey = "cod_filme_tfi";

    protected $fillable = [
        'nome_filme_tfi',
        'id_filme_themovie_tfi',
        'sinopse_filme_tfi',
        'avaliacao_filme_tfi',
        'data_lancamento_filme_tfi',
        'path_filme_tfi',
    ];
}
