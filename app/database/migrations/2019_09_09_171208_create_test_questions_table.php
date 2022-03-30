<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('task_block_id')->unsigned();
            $table->string('text');
            $table->integer('correct_count')->default(1);//how much correct variants will bee in variants list
            $table->integer('wrong_count')->default(3);//how much wrong variants will be in variants
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
        Schema::dropIfExists('test_questions');
    }
}
