<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->bigIncrements('level_id');
            $table->string('level');
            $table->integer('course_id')->unsigned();
            $table->longText('level_description');
            $table->softDeletes();
            $table->timestamps();
            // 出現錯誤
            // $table->foreign('course_id')->references('level_id')->on('ptable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels');
    }
}
