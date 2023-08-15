<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomponensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komponens', function (Blueprint $table) {
            $table->increments('id');
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
        Schema::dropIfExists('komponens');
    }
}
