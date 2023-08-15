<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Newcolumnsinstance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instances', function (Blueprint $table) {
            $table->integer('type')->after('name');
            $table->string('address')->after('country');
            $table->string('website')->after('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instances', function (Blueprint $table) {
            //
        });
    }
}
