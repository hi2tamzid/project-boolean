<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('login_id');
            $table->string('password', 30);
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('gender', 7);
            $table->string('mobile', 20);
            $table->boolean('is_acc_open');
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
        Schema::dropIfExists('supervisors');
    }
}
