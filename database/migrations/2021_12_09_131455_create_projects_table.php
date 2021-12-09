<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('type', 100);
            $table->text('description')->nullable();
            $table->tinyInteger('progress');
            $table->date('start_time');
            $table->date('end_time');
            $table->boolean('is_completed');
            $table->tinyInteger('remark')->nullable();
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
        Schema::dropIfExists('project__supervisors');
        Schema::dropIfExists('team__projects');
        Schema::dropIfExists('project__sessions');
        Schema::dropIfExists('student__marks');
        Schema::dropIfExists('projects');
    }
}
