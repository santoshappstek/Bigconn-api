<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMylittleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mylittle', function (Blueprint $table) {
            $table->increments('mylittle_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number',15)->nullable();
            $table->string('phone_type')->nullable();
            $table->date('match_start');
            $table->date('dateof_birth')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_number')->nullable();
            $table->string('emergency_name')->nullable();
            $table->string('emergency_number')->nullable();
            $table->string('picture')->nullable();
            $table->unsignedinteger('userid');
            $table->integer('active_status')->default(0);            
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->foreign('userid')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mylittle');
    }
}
