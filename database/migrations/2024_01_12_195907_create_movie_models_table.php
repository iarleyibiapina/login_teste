<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tab_filmes_tfi', function (Blueprint $table) {
            $table->id('cod_filme_tfi')->comment("Chave primaria da coluna tabela de filmes - tfi");
            $table->string('id_filme_themovie_tfi')->comment("Id do filme retornado pela api do the movie da coluna tabela de filmes - tfi");
            $table->string('nome_filme_tfi')->comment("Nome do filme da coluna tabela de filmes - tfi");
            $table->text('sinopse_filme_tfi')->comment("Sinopse do filme da coluna tabela de filmes - tfi");
            $table->string('avaliacao_filme_tfi')->comment("Avaliação do filme da coluna tabela de filmes - tfi");
            $table->string('data_lancamento_filme_tfi')->comment("Data de lançamento do filme da coluna tabela de filmes - tfi");
            $table->string('path_filme_tfi')->comment("Caminho do poster do filme da coluna tabela de filmes - tfi");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tab_filmes_tfi');
    }
};
