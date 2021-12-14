<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('display_name')->nullable();
            $table->string('email')->unique();            
            $table->string('phone_number',15)->nullable();
            $table->string('password')->nullable();            
            $table->unsignedinteger('usertypeid');
            //$table->string('chapterid')->default(1);
            $table->integer('case_manager')->default(0);
            $table->integer('addto_agency')->default(0);            
            $table->integer('otp')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('post_code')->nullable();
            $table->date('dateof_birth')->nullable();
            $table->integer('created_by');
            $table->string('profile_pic',100)->default('default.png');
            $table->integer('casemanagerid')->nullable();
            $table->string('pattern')->nullable();
            $table->timestamp('registered_on')->nullable();
            $table->timestamp('logged_in_time')->nullable();
            $table->timestamp('logged_out')->nullable();
            $table->integer('active_status')->default(0);
            $table->integer('is_deleted')->default(0);
            $table->rememberToken();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            //$table->foreign('usertypeid')->references('usertype_id')->on('user_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
