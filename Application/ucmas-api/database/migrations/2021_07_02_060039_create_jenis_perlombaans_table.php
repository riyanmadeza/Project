<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisPerlombaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jenis_perlombaan', function (Blueprint $table) {
            $table->string('JENIS_CODE', 10)->primary();
            $table->string('JENIS_NAME', 500);
            $table->string('TIPE', 1)->nullable(true)->default(null);
            $table->string('ENTRY_USER', 50)->nullable(true)->default(null);
            $table->dateTime('ENTRY_DATE')->nullable(true)->default(null);
            $table->string('UPDATE_USER', 50)->nullable(true)->default(null);
            $table->dateTime('UPDATE_DATE')->nullable(true)->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_jenis_perlombaan');
    }
}
