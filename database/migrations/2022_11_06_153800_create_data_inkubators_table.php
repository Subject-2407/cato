<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataInkubatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_inkubators', function (Blueprint $table) {
            $table->increment('id');
            $table->float('suhu');
            $table->integer('sisa_hari');
            $table->integer('total_hari');
            $table->integer('motor');
            $table->integer('kipas');
            $table->integer('lampu');
            $table->integer('mode');
            $table->integer('sistem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_inkubators');
    }
}
