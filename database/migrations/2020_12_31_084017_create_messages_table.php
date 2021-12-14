<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('message_id');
            $table->unsignedinteger('sender_id');
            $table->integer('receiver_id')->nullable();
            $table->string('email')->nullable();
            $table->string('subject')->nullable();
            $table->string('body')->nullable();
            $table->string('message_type')->default('sent');
            $table->integer('viewed_status')->default(0);
            $table->integer('delivery_status')->default(0);
            $table->integer('delete_status')->default(0);
            $table->integer('active_status')->default(0);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->foreign('sender_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
