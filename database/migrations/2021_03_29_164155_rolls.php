<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rolls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolls', function (Blueprint $table) {
            $table->bigIncrements('roll_id');
            $table->integer('student_id');
            $table->string('username');
            $table->string('password');
            $table->datetime('login_time');
            $table->datetime('logout_time');
            $table->softDeletes();
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
        Schema::dropIfExists('rolls');
    }
}
