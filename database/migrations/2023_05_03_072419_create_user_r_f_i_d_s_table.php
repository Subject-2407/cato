<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRFIDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_r_f_i_d_s', function (Blueprint $table) {
            $table->string('rfid');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('user_r_f_i_d_s');
    }
}
