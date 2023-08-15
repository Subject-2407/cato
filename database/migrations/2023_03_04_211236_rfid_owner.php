<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RfidOwner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rfid_owner', function (Blueprint $table) {
            $table->string('nis')->unique();
            $table->string('nama');
            $table->string('kelas');
            $table->string('rfid')->nullable();
            $table->foreign('rfid')->references('nomor_rfid')->on('robotik_rfid')->onDelete('set null');
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
        Schema::dropIfExists('rfid_users');
    }
}
