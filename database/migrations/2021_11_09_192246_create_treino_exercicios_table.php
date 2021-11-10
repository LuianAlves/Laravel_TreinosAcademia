<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreinoExerciciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treino_exercicios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('treino_id')->unsigned();
            $table->unsignedBigInteger('exercicio_id')->unsigned();
            $table->string('divisao_treino')->nullable();
            $table->timestamps();

            $table->foreign('exercicio_id')->references('id')->on('exercicios_treino')->onDelete('cascade');
            $table->foreign('treino_id')->references('codigo_treino')->on('treino_alunos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treino_exercicios');
    }
}
