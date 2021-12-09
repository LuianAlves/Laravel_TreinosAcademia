<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAvaliacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dados_avaliacao_fisicas', function (Blueprint $table) {
            $table->string('data_mes_ava')->after('created_at');
        });

        Schema::table('perimetros_avaliacao_fisicas', function (Blueprint $table) {
            $table->string('data_mes_ava')->after('created_at');
        });

        Schema::table('dobras_cutaneas_avaliacao_fisicas', function (Blueprint $table) {
            $table->string('data_mes_ava')->after('created_at');
        });

        Schema::table('neuromotores_avaliacao_fisicas', function (Blueprint $table) {
            $table->string('data_mes_ava')->after('created_at');
        });

        Schema::table('anamnese_avaliacao_fisicas', function (Blueprint $table) {
            $table->string('data_mes_ava')->after('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
