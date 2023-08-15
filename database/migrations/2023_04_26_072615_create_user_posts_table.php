<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('poster_id');
            $table->string('poster_name');
            $table->string('poster_avatar');
            $table->unsignedBigInteger('instance_id');
            $table->string('caption');
            $table->string('media');
            $table->foreign('poster_id')->references('id')->on('user_catos')->onDelete('cascade');
            $table->foreign('instance_id')->references('id')->on('instances')->onDelete('cascade');
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
        Schema::dropIfExists('user_posts');
    }
}
