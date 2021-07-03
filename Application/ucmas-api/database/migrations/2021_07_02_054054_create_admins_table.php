<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_admin', function (Blueprint $table) {
            $table->string('CABANG_CODE', 10);
            $table->string('USERNAME', 50);
            $table->string('PASSWORD_ADMIN', 50)->nullable(true)->default(null);
            $table->string('NAMA_ADMIN', 150)->nullable(true)->default(null);
            $table->string('ALAMAT_ADMIN', 500)->nullable(true)->default(null);
            $table->string('NO_TELP_ADMIN', 50)->nullable(true)->default(null);
            $table->string('EMAIL_ADMIN', 50)->nullable(true)->default(null);
            $table->string('ENTRY_USER', 50)->nullable(true)->default(null);
            $table->dateTime('ENTRY_DATE')->nullable(true)->default(null);
            $table->string('UPDATE_USER', 50)->nullable(true)->default(null);
            $table->dateTime('UPDATE_DATE')->nullable(true)->default(null);
            $table->primary(['CABANG_CODE', 'USERNAME']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_admin');
    }
}
