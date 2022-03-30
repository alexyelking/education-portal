<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->text('description_short')->nullable();
            $table->text('description');
            $table->string('tags')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->bigInteger('created_by')->nullable()->unsigned();
            $table->timestamps();
            $table->foreign('created_by')
                ->references('id')->on("users")->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
