<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreinoAlunoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treino_alunos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('codigo_treino')->unsigned();
            $table->string('nivel_aluno');
            $table->string('frequencia_semanal');
            $table->string('divisao_treino');
            $table->timestamps();

            $table->foreign('codigo_treino')->references('codigo_treino')->on('treinos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treino_aluno');
    }
}
