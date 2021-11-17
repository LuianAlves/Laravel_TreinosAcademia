<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerimetrosAvaliacaoFisicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perimetros_avaliacao_fisicas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id')->unsigned();
            $table->integer('codigo_avaliacao');
            $table->string('torax')->nullable();
            $table->string('cintura')->nullable();
            $table->string('abdomen')->nullable();
            $table->string('quadril')->nullable();
            $table->string('antebraco_direito')->nullable();
            $table->string('antebraco_esquerdo')->nullable();
            $table->string('braco_direito')->nullable();
            $table->string('braco_esquerdo')->nullable();
            $table->string('coxa_direita')->nullable();
            $table->string('coxa_esquerda')->nullable();
            $table->string('panturrilha_direita')->nullable();
            $table->string('panturrilha_esquerda')->nullable();
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
        Schema::dropIfExists('perimetros_avaliacao_fisicas');
    }
}
