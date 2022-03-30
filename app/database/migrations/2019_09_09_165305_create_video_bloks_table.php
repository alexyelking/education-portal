<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoBloksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_blocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('link');
            $table->integer('position');//serial number in all lesson's steps list
            $table->timestamps();
            $table->bigInteger('lesson_id')->unsigned();
            $table->softDeletes();

            $table->foreign('lesson_id')->references('id')->on('lessons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_blocks');
    }
}
