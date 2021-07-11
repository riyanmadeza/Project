<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKompetisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kompetisi', function (Blueprint $table) {
            $table->string('ROW_ID', 20);
            $table->string('CABANG_CODE', 10);
            $table->string('KOMPETISI_NAME', 10);
            $table->date('TANGGAL_KOMPETISI');
            $table->string('JAM_MULAI', 6)->nullable(true)->default(null);
            $table->string('JAM_SAMPAI', 6)->nullable(true)->default(null);
            $table->string('JENIS_CODE', 10)->nullable(true)->default(null);
            $table->string('JENIS_NAME', 500)->nullable(true)->default(null);
            $table->string('TIPE', 1)->nullable(true)->default(null);
            $table->string('ROW_ID_KATEGORI', 20)->nullable(true)->default(null);
            $table->string('KATEGORI_CODE', 10)->nullable(true)->default(null);
            $table->string('KATEGORI_NAME', 500)->nullable(true)->default(null);
            $table->bigInteger('LAMA_PERLOMBAAN', false, false)->nullable(true)->default(null);
            $table->decimal('KECEPATAN', 20, 2, false)->nullable(true)->default(null);
            $table->string('ENTRY_USER', 50)->nullable(true)->default(null);
            $table->dateTime('ENTRY_DATE')->nullable(true)->default(null);
            $table->string('UPDATE_USER', 50)->nullable(true)->default(null);
            $table->dateTime('UPDATE_DATE')->nullable(true)->default(null);
            $table->primary('ROW_ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kompetisi');
    }
}
