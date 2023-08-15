<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInstOwner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instances', function (Blueprint $table) {
            $table->unsignedBigInteger('owner_id')->after('code')->nullable();
            $table->foreign('owner_id')->references('id')->on('user_catos')->nullOnDelete();
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
