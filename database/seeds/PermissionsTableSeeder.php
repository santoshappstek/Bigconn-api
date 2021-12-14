<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
       	    'permission_id' => 1,
            'permission_name' => "Administrator",
        ]);
        DB::table('permissions')->insert([
       	    'permission_id' => 2,
            'permission_name' => "User Management",
        ]);
        DB::table('permissions')->insert([
       	    'permission_id' => 3,
            'permission_name' => "Resources",
        ]);
        DB::table('permissions')->insert([
       	    'permission_id' => 4,
            'permission_name' => "Messaging & Notifications",
        ]);
        DB::table('permissions')->insert([
       	    'permission_id' => 5,
            'permission_name' => "Activities",
        ]);
        DB::table('permissions')->insert([
       	    'permission_id' => 6,
            'permission_name' => "Discount Programs",
        ]);
        DB::table('permissions')->insert([
       	    'permission_id' => 7,
            'permission_name' => "Events",
        ]);
        DB::table('permissions')->insert([
       	    'permission_id' => 8,
            'permission_name' => "Bigs App Access",
        ]);
    }
}
