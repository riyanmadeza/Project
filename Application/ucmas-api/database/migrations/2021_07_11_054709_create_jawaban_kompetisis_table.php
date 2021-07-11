<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanKompetisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jawaban_kompetisi', function (Blueprint $table) {
            $table->string('ROW_ID_KOMPETISI', 20);
            $table->string('ID_PESERTA', 20);
            $table->bigInteger('SOAL_NO', false, false);
            $table->longText('PERTANYAAN')->nullable(true)->default(null);
            $table->decimal('JAWABAN_PESERTA', 20, 4, false)->nullable(true)->default(null);
            $table->bigInteger('JAWAB_DETIK_BERAPA', false, false)->nullable(true)->default(null);
            $table->dateTime('JAWAB_DATE')->nullable(true)->default(null);
            $table->decimal('KUNCI_JAWABAN', 20, 4, false)->nullable(true)->default(null);
            $table->bigInteger('SCORE_PESERTA', false, false)->nullable(true)->default(null);
            $table->string('ENTRY_USER', 50)->nullable(true)->default(null);
            $table->dateTime('ENTRY_DATE')->nullable(true)->default(null);
            $table->string('UPDATE_USER', 50)->nullable(true)->default(null);
            $table->dateTime('UPDATE_DATE')->nullable(true)->default(null);
            $table->primary(['ROW_ID_KOMPETISI', 'ID_PESERTA', 'SOAL_NO']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_jawaban_kompetisi');
    }
}
