<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id');
            $table->string('password', 30);
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('gender', 7);
            $table->string('mobile', 20);
            $table->date('year_of_admission');
            $table->string('current_semester', 4);
            $table->integer('batch');
            $table->boolean('is_graduated');
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
        Schema::dropIfExists('team__members');
        Schema::dropIfExists('student__marks');
        Schema::dropIfExists('students');
    }
}
