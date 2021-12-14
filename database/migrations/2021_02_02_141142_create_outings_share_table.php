<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutingsShareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outings_share', function (Blueprint $table) {
            $table->increments('share_id');
            $table->unsignedinteger('outingid');
            $table->integer('shared_by');
            $table->string('shared_to');
            $table->integer('user_id')->nullable();
            $table->integer('active_status')->default(0);
            $table->integer('join_status')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->foreign('outingid')->references('outing_id')->on('outings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outings_share');
    }
}
