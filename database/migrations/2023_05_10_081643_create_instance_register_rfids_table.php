<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstanceRegisterRfidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instance_register_rfids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instance_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('instance_id')->references('id')->on('instances')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('user_catos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instance_register_rfids');
    }
}
