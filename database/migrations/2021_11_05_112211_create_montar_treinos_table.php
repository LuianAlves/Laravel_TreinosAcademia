<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMontarTreinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('montar_treinos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('professor_id')->unsigned();
            $table->unsignedBigInteger('aluno_id')->unsigned();
            $table->string('codigo_treino');
            $table->string('nivel_treino')->nullable();
            $table->string('frequencia')->nullable();
            $table->string('divisao_treino')->nullable();
            $table->string('nome_treino')->nullable();
            $table->timestamps();

            $table->foreign('professor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('montar_treinos');
    }
}
