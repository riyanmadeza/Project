<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParameterKompetisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_parameter_kompetisi', function (Blueprint $table) {
            $table->string('ROW_ID_KOMPETISI', 20);
            $table->string('PARAMETER_ID', 20);
            $table->bigInteger('SOAL_DARI', false, false)->nullable(true)->default(null);
            $table->bigInteger('SOAL_SAMPAI', false, false)->nullable(true)->default(null);
            $table->bigInteger('PANJANG_DIGIT', false, false)->nullable(true)->default(null);
            $table->bigInteger('JUMLAH_MUNCUL', false, false)->nullable(true)->default(null);
            $table->bigInteger('JML_BARIS_PER_MUNCUL', false, false)->nullable(true)->default(null);
            $table->bigInteger('MAX_PANJANG_DIGIT', false, false)->nullable(true)->default(null);
            $table->bigInteger('MAX_JML_DIGIT_PER_SOAL', false, false)->nullable(true)->default(null);
            $table->bigInteger('JML_BARIS_PER_SOAL', false, false)->nullable(true)->default(null);
            $table->string('MUNCUL_ANGKA_MINUS', 1)->nullable(true)->default(null);
            $table->string('MUNCUL_ANGKA_PERKALIAN', 1)->nullable(true)->default(null);
            $table->bigInteger('DIGIT_PERKALIAN', false, false)->nullable(true)->default(null);
            $table->string('MUNCUL_ANGKA_PEMBAGIAN', 1)->nullable(true)->default(null);
            $table->bigInteger('DIGIT_PEMBAGIAN', false, false)->nullable(true)->default(null);
            $table->string('MUNCUL_ANGKA_DECIMAL', 1)->nullable(true)->default(null);
            $table->bigInteger('DIGIT_DECIMAL', false, false)->nullable(true)->default(null);
            $table->bigInteger('FONT_SIZE', false, false)->nullable(true)->default(null);
            $table->string('ENTRY_USER', 50)->nullable(true)->default(null);
            $table->dateTime('ENTRY_DATE')->nullable(true)->default(null);
            $table->string('UPDATE_USER', 50)->nullable(true)->default(null);
            $table->dateTime('UPDATE_DATE')->nullable(true)->default(null);
            $table->primary(['ROW_ID_KOMPETISI', 'PARAMETER_ID'], 'parameter_kompetisi_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_parameter_kompetisi');
    }
}
