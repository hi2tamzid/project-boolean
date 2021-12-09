<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student__marks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned()->index();
            $table->bigInteger('session_id')->unsigned()->index();
            $table->bigInteger('project_id')->unsigned()->index();
            $table->bigInteger('team_id')->unsigned()->index();
            $table->tinyInteger('class_attendence')->nullable();
            $table->tinyInteger('class_performance')->nullable();
            $table->tinyInteger('report')->nullable();
            $table->tinyInteger('viva')->nullable();
            $table->tinyInteger('final_exam')->nullable();
            $table->foreign('student_id')
            ->references('id')->on('students')
            ->onDelete('cascade');
            $table->foreign('session_id')
            ->references('id')->on('sessions')
            ->onDelete('cascade');
            $table->foreign('project_id')
            ->references('id')->on('projects')
            ->onDelete('cascade');
            $table->foreign('team_id')
            ->references('id')->on('teams')
            ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student__marks');
    }
}
