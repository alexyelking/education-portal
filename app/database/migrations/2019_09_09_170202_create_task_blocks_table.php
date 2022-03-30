<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_blocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('retries_count')->default(-1);//(-1) - endless retries
            $table->integer('position');//serial number in steps list
            $table->integer('cost')->default(1);//how much we get after complition
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
        Schema::dropIfExists('task_blocks');
    }
}
