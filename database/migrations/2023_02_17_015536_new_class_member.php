<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewClassMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('class_members', function (Blueprint $table) {
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('class_id')->references('id')->on('instance_classes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('user_catos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_members', function (Blueprint $table) {
            //
        });
    }
}
