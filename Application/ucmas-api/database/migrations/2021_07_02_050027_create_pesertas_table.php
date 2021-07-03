<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_peserta', function (Blueprint $table) {
            $table->string('ID_PESERTA', 10)->primary();
            $table->string('NAMA_PESERTA', 50);
            $table->string('JENIS_KELAMIN', 1)->nullable(true)->default(null);
            $table->string('TEMPAT_LAHIR', 50)->nullable(true)->default(null);
            $table->dateTime('TANGGAL_LAHIR')->nullable(true)->default(null);
            $table->string('ALAMAT_PESERTA', 500)->nullable(true)->default(null);
            $table->string('SEKOLAH_PESERTA', 500)->nullable(true)->default(null);
            $table->string('NO_TELP_PESERTA', 50)->nullable(true)->default(null);
            $table->string('EMAIL_PESERTA', 50)->unique();
            $table->string('IS_USMAS', 1)->nullable(true)->default(null);
            $table->string('PASSWORD_PESERTA', 200);
            $table->string('CABANG_CODE', 10);
            $table->string('ENTRY_USER', 50)->nullable(true)->default(null);
            $table->dateTime('ENTRY_DATE')->nullable(true)->default(null);
            $table->string('UPDATE_USER', 50)->nullable(true)->default(null);
            $table->dateTime('UPDATE_DATE')->nullable(true)->default(null);
            //$table->enum('jns_kelamin', ['Laki-laki','Perempuan']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_peserta');
    }
}
