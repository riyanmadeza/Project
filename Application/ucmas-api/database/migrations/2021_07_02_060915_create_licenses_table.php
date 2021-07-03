<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_license', function (Blueprint $table) {
            $table->string('CABANG_CODE', 10);
            $table->dateTime('DATEFROM');
            $table->dateTime('DATETO');
            $table->string('ENTRY_USER', 50)->nullable(true)->default(null);
            $table->dateTime('ENTRY_DATE')->nullable(true)->default(null);
            $table->string('UPDATE_USER', 50)->nullable(true)->default(null);
            $table->dateTime('UPDATE_DATE')->nullable(true)->default(null);
            $table->primary(['CABANG_CODE', 'DATEFROM', 'DATETO']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_license');
    }
}
