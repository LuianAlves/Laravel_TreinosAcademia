<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoAdicionalContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('info_adicional_contratos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id')->unsigned();
            $table->unsignedBigInteger('professor_id')->unsigned();

            $table->string('codigo_contrato');

            $table->text('funcao_professor');
            $table->text('objetivo_aluno');

            $table->string('hora_inicio');
            $table->string('hora_final');
            $table->string('dia_semana');

            $table->string('reposicao_aula_mensal');

            $table->decimal('pagamento_mensal', 8, 2);
            $table->text('pagamento_mensal_inscrito');
            $table->integer('vencimento_pagamento');
            $table->integer('dia_de_tolerancia');
            $table->integer('multa_atraso');

            $table->string('duracao_contrato');
            $table->string('inicio_contrato');
            $table->string('final_contrato');

            $table->text('nome_foro');
            $table->string('estado_foro');

            $table->string('data_estado_contrato');
            $table->integer('data_dia_contrato');
            $table->string('data_mes_contrato');
            $table->integer('data_ano_contrato');

            $table->string('testemunha_um')->nullable();
            $table->string('testemunha_um_rg')->nullable();
            $table->string('testemunha_dois')->nullable();
            $table->string('testemunha_dois_rg')->nullable();

            $table->timestamps();

            $table->foreign('aluno_id')->references('id')->on('dados_aluno_contratos')->onDelete('cascade');
            $table->foreign('professor_id')->references('id')->on('dados_professor_contratos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_adicional_contratos');
    }
}
