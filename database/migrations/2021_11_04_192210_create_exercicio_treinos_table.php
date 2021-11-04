<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercicioTreinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercicio_treinos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_treino_id')->unsigned();
            $table->foreign('categoria_treino_id')->references('id')->on('categoria_treinos')->onDelete('cascade');
            $table->string('nome_exercicio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercicio_treinos');
    }
}
