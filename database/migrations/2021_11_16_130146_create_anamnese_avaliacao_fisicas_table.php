<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnamneseAvaliacaoFisicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anamnese_avaliacao_fisicas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id')->unsigned();
            $table->integer('codigo_avaliacao');
            $table->string('atividade_fisica')->nullable();
            $table->string('medicamento')->nullable();
            $table->string('cirurgia')->nullable();
            $table->string('doenca_familia')->nullable();
            $table->text('observacoes')->nullable();
            $table->string('prescricao_medica')->nullable();
            $table->string('dor_peito')->nullable();
            $table->string('dor_peito_ult_mes')->nullable();
            $table->string('tonteira_desmaio')->nullable();
            $table->string('problema_osseo')->nullable();
            $table->string('medicamento_pressao_arterial')->nullable();
            $table->string('atividade_sem_supervisao')->nullable();

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
        Schema::dropIfExists('anamnese_avaliacao_fisicas');
    }
}
