<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimpleQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simple_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('task_block_id')->unsigned();
            $table->string('text');
            $table->string('keywords');//keywords to compare user's answer with
            $table->string('image_link')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('task_block_id')->references('id')->on('task_blocks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simple_questions');
    }
}
