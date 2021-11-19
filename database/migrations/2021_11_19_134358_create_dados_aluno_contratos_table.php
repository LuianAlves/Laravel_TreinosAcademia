<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDadosAlunoContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_aluno_contratos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id')->unsigned();
            $table->string('nome');
            $table->string('estado_civil')->nullable();
            $table->string('profissao')->nullable();
            $table->string('rg');
            $table->string('cpf');
            $table->string('endereco');
            $table->string('numero_casa');
            $table->string('bairro');
            $table->string('cep');
            $table->string('cidade');
            $table->string('estado')->nullable();
            $table->string('telefone_fixo')->nullable();
            $table->string('telefone_celular')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('dados_aluno_contratos');
        Schema::dropIfExists('dados_professor_contratos');
        Schema::dropIfExists('info_adicional_contratos');
    }
}
