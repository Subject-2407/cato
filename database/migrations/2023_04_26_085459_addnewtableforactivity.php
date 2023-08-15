<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Addnewtableforactivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_activities', function (Blueprint $table) {
            $table->unsignedBigInteger('instance_id')->after('user_id');
            $table->foreign('user_id')->references('id')->on('user_catos')->onDelete('cascade');
            $table->foreign('instance_id')->references('id')->on('instances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_activities', function (Blueprint $table) {
            //
        });
    }
}
