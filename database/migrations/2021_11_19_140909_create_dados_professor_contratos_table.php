<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDadosProfessorContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('dados_professor_contratos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_professor');
            $table->string('estado_civil_professor')->nullable();
            $table->string('profissao_professor')->nullable();
            $table->string('rg_professor');
            $table->string('cpf_professor');
            $table->string('cref_professor')->nullable();
            $table->string('endereco_professor');
            $table->string('numero_casa_professor');
            $table->string('bairro_professor');
            $table->string('cep_professor');
            $table->string('cidade_professor');
            $table->string('estado_professor')->nullable();
            $table->string('telefone_fixo_professor')->nullable();
            $table->string('telefone_celular_professor')->nullable();
            $table->string('email_professor')->nullable();
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
        Schema::dropIfExists('dados_professor_contratos');
    }
}
