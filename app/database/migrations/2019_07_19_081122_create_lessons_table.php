<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('course_id')->unsigned();

            $table->string('title')->default('No title');
            $table->string('slug')->nullable()->default(null);
            $table->string('excerpt')->nullable()->default(null);
            $table->text('content_html')->nullable()->default(null);
            $table->string('video_link')->nullable()->default(null);

            $table->bigInteger('views_count')->default(0)->unsigned();
            $table->bigInteger('likes')->default(0)->unsigned();
            $table->bigInteger('dislikes')->default(0)->unsigned();

            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable()->default(null);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
