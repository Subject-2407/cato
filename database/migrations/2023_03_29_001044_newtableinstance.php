<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Newtableinstance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_catos', function (Blueprint $table) {
            $table->unsignedBigInteger('instance_id')->after('instance_code')->nullable();
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
        Schema::table('user_catos', function (Blueprint $table) {
            //
        });
    }
}
