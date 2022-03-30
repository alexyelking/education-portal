<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable()->default(NULL);
            $table->string('dob')->nullable()->default(NULL);
            $table->string('phone')->nullable()->default(NULL);
            $table->string('skills')->nullable()->default(NULL);
            $table->string('hobbies')->nullable()->default(NULL);
            $table->string('signature')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('dob');
            $table->dropColumn('phone');
            $table->dropColumn('skills');
            $table->dropColumn('hobbies');
            $table->dropColumn('signature');
        });
    }
}
