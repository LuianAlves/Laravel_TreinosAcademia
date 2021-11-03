<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('professor_id')->unsigned();
            $table->foreign('professor_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nome');
            $table->string('email')->nullable();
            $table->string('telefone');
            $table->text('observacao_restricao')->nullable();
            $table->string('tipo_treino');
            $table->string('objetivo');
            $table->string('pagamento')->nullable();
            $table->string('codigo_aluno')->nullable();
            $table->string('genero')->nullable();
            $table->string('data_cadastro')->nullable();
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
        Schema::dropIfExists('alunos');
    }
}
