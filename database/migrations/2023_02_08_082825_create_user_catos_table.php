<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_catos', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('instance_code');
            $table->integer('role');
            $table->string('firstname');
            $table->string('lastname');
            $table->date('birthdate');
            $table->string('gender');
            $table->string('profession')->nullable()->change();;
            $table->string('personalid')->nullable();
            $table->string('country');
            $table->string('phone')->nullable();
            $table->string('profile')->nullable();
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
        Schema::dropIfExists('user_catos');
    }
}
