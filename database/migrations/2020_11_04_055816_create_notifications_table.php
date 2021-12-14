<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('notify_id');
            $table->string('message');
            $table->string('sent_to');
            $table->date('scheduled_date')->format('d-m-Y')->nullable();
            $table->time('scheduled_time')->format('H:i a')->nullable();
            $table->string('timezone')->nullable();            
            $table->date('sent_date')->format('d-m-Y')->nullable();
            $table->string('message_status')->nullable();
            $table->integer('note_status')->default(0);
            $table->string('viewed_status')->default(0);
            $table->unsignedinteger('created_by');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->foreign('created_by')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
