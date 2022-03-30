<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LinkLessonsToModules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropForeign('lessons_course_id_foreign');
            $table->renameColumn('course_id', 'module_id');
        });
        Schema::table('lessons', function (Blueprint $table) {
            $table->foreign('module_id')->references('id')->on('modules');

            $table->integer('position');//serial number in all lessons list

            $table->index('title');
            $table->index('published_at');

            //we don't need to hold all this in lesson. It goes to the separated tables (steps)
            $table->dropColumn('likes');
            $table->dropColumn('dislikes');
            $table->dropColumn('views_count');
            $table->dropColumn('video_link');
            $table->dropColumn('content_html');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropForeign('lessons_module_id_foreign');
            $table->renameColumn('module_id', 'course_id');

            $table->foreign('course_id')->references('id')->on('courses');
            $table->dropColumn('position');

            $table->text('content_html')->nullable()->default(null);
            $table->string('video_link')->nullable()->default(null);

            $table->bigInteger('views_count')->default(0)->unsigned();
            $table->bigInteger('likes')->default(0)->unsigned();
            $table->bigInteger('dislikes')->default(0)->unsigned();
        });
    }
}
