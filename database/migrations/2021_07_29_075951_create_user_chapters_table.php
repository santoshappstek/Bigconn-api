<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_chapters', function (Blueprint $table) {
            $table->increments('userchapter_id');
            $table->unsignedinteger('userid');
            $table->unsignedinteger('chapterid');
            $table->integer('active_status')->default(0);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->foreign('userid')->references('user_id')->on('users');
            $table->foreign('chapterid')->references('chapter_id')->on('chapters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_chapters');
    }
}
