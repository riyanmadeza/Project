<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriPerlombaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kategori_perlombaan', function (Blueprint $table) {
            $table->string('JENIS_CODE', 10);
            $table->string('KATEGORI_CODE', 10);
            $table->string('KATEGORI_NAME', 500);
            $table->bigInteger('LAMA_PERLOMBAAN',false,false)->nullable(true)->default(null);
            $table->string('ENTRY_USER', 50)->nullable(true)->default(null);
            $table->dateTime('ENTRY_DATE')->nullable(true)->default(null);
            $table->string('UPDATE_USER', 50)->nullable(true)->default(null);
            $table->dateTime('UPDATE_DATE')->nullable(true)->default(null);
            $table->primary(['JENIS_CODE', 'KATEGORI_CODE']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kategori_perlombaan');
    }
}
