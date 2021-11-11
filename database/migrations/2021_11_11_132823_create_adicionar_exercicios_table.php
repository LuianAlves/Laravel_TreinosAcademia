<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdicionarExerciciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adicionar_exercicios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('treino_id')->unsigned();
            $table->unsignedBigInteger('exercicio_id')->unsigned();
            $table->string('repeticao')->nullable();
            $table->string('serie')->nullable();
            $table->string('codigo_treino');
            $table->string('divisao_treino');
            $table->timestamps();

            $table->foreign('treino_id')->references('id')->on('montar_treinos')->onDelete('cascade');
            $table->foreign('exercicio_id')->references('id')->on('exercicio_treinos')->onDelete('cascade');
        });      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adicionar_exercicios');
    }
}
