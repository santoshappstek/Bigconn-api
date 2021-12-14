<?php

use Illuminate\Database\Seeder;

class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_type')->insert([
       	    'usertype_id' => 1,
            'user_type' => "Agency User",
        ]);
        DB::table('user_type')->insert([
       	    'usertype_id' => 2,
            'user_type' => "BigS User",
        ]);
        DB::table('user_type')->insert([
       	    'usertype_id' => 3,
            'user_type' => "End User",
        ]);
        DB::table('user_type')->insert([
            'usertype_id' => 4,
            'user_type' => "Organazation User",
        ]);
        DB::table('user_type')->insert([
            'usertype_id' => 5,
            'user_type' => "Super Admin",
        ]);
    }
}
