<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {       
        Schema::create('event_master', function (Blueprint $table) {
            $table->increments('event_id');
            $table->unsignedinteger('eventtypeid');
            //$table->unsignedinteger('chapterid')->nullable();
            $table->string('organized_by');
            $table->string('event_name');
            $table->text('description')->nullable();
            $table->text('prerequisites')->nullable();
            $table->text('notes')->nullable();
            $table->text('disclaimer')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->unsignedinteger('created_userid');
            $table->integer('self_register')->default(0);
            $table->integer('noof_seats')->nullable();
            $table->integer('available_seats')->nullable();
            $table->string('tag_color')->default('FF6565');
            $table->integer('paid_event')->default(1);
            $table->integer('send_notifications')->default(0);
            $table->integer('active_status')->default(0); 
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->foreign('eventtypeid')->references('eventtype_id')->on('event_types');
            $table->foreign('created_userid')->references('user_id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_master');
    }
}
