<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRFIDUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rfid_users', function (Blueprint $table) {
            $table->string('nis')->unique();
            $table->string('nama');
            $table->string('kelas');
            $table->string('nomor_rfid')->nullable();
            $table->foreign('nomor_rfid')->references('nomor_rfid')->on('robotik_rfid')->onDelete('set null');
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
    }
}
