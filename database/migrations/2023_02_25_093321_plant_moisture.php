<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlantMoisture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_moisture', function (Blueprint $table) {
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

    }
}
