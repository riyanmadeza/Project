<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cabang', function (Blueprint $table) {
            $table->string('CABANG_CODE', 10)->primary();
            $table->string('CABANG_NAME', 50);
            $table->string('LOKASI', 100)->nullable(true)->default(null);
            $table->string('IS_PUSAT', 1)->nullable(true)->default(null);
            $table->string('ALAMAT', 500);
            $table->string('NO_TELP', 50);
            $table->string('EMAIL', 50);
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
        Schema::dropIfExists('tb_cabang');
    }
}
