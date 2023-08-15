<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantMoisturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_moistures', function (Blueprint $table) {
            $table->float('kelembapan')->nullable();
            $table->integer('pump')->nullable();
            $table->integer('mode')->nullable();
            $table->dateTime('terakhir_pump_hidup')->nullable();
            $table->dateTime('terakhir_pump_mati')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_moistures');
    }
}
