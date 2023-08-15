<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AttachmentTask extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_grades', function (Blueprint $table) {
            $table->integer('completed')->after('student_id')->change();
            $table->string('attachment')->after('marks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_grades', function (Blueprint $table) {
            //
        });
    }
}
