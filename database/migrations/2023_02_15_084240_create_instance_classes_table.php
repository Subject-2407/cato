<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstanceClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instance_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instance_id');
            $table->string('name');
            $table->unsignedBigInteger('owner_id');
            $table->string('avatar')->nullable();
            $table->foreign('instance_id')->references('id')->on('instances')->onDelete('cascade');
            $table->foreign('owner_id')->references('id')->on('user_catos')->onDelete('cascade');
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
        Schema::dropIfExists('instance_classes');
    }
}
