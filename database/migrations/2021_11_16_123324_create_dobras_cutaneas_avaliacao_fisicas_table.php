<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDobrasCutaneasAvaliacaoFisicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dobras_cutaneas_avaliacao_fisicas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id')->unsigned();
            $table->string('subscapular')->nullable();
            $table->string('axilar_media')->nullable();
            $table->string('supra_iliaca')->nullable();
            $table->string('peitoral')->nullable();
            $table->string('triciptal')->nullable();
            $table->string('abdominal')->nullable();
            $table->string('coxa')->nullable();
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
        Schema::dropIfExists('dobras_cutaneas_avaliacao_fisicas');
    }
}
