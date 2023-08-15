<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Shortownerprofile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instance_classes', function (Blueprint $table) {
            $table->string('owner_name')->after('owner_id');
            $table->string('owner_avatar')->after('owner_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instance_classes', function (Blueprint $table) {
            //
        });
    }
}
