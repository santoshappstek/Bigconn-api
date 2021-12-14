<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_id' => 1,
            'first_name' => "Super",
            'last_name' => "Admin",
            'display_name' => "Super Admin",
            'email' => 'superadmin@appstekcorp.com',
            'phone_number' => '',
            'password' => '$2y$10$EdcPn4a8LRJp3pGk0oMKtuIwWAL4nl1tK3ALB.qpFnddgcWfsOLUy',
            'usertypeid' => 5,
            'case_manager' => 0,
            'addto_agency' =>0,
            'otp' => '',
            'city' => '',
            'state' => '',
            'post_code' => '',
            'dateof_birth' => '',
            'created_by' => 1,
            'profile_pic' => env('FILE_PATH').'/profile_pic/'.'default.png',
            'casemanagerid' => '',
            'pattern' => '',
            'registered_on' => '',
            'logged_in_time' => '',
            'logged_out' => '',
            'active_status' => 0,
            'is_deleted' => ''
        ],
        [
            'user_id' => 2,
            'first_name' => "Organization",
            'last_name' => "User",
            'display_name' => "Organization User",
            'email' => 'organizationuser@appstekcorp.com',
            'phone_number' => '',
            'password' => '$2y$10$EdcPn4a8LRJp3pGk0oMKtuIwWAL4nl1tK3ALB.qpFnddgcWfsOLUy',
            'usertypeid' => 4,
            'case_manager' => 0,
            'addto_agency' =>0,
            'otp' => '',
            'city' => '',
            'state' => '',
            'post_code' => '',
            'dateof_birth' => '',
            'created_by' => 1,
            'profile_pic' => env('FILE_PATH').'/profile_pic/'.'default.png',
            'casemanagerid' => '',
            'pattern' => '',
            'registered_on' => '',
            'logged_in_time' => '',
            'logged_out' => '',
            'active_status' => 0,
            'is_deleted' => 0
        ],
        [
            'user_id' => 3,
            'first_name' => "Bigs",
            'last_name' => "User",
            'display_name' => "Bigs User",
            'email' => 'bigsuser@appstekcorp.com',
            'phone_number' => '',
            'password' => '$2y$10$EdcPn4a8LRJp3pGk0oMKtuIwWAL4nl1tK3ALB.qpFnddgcWfsOLUy',
            'usertypeid' => 2,
            'case_manager' => 0,
            'addto_agency' =>0,
            'otp' => '',
            'city' => '',
            'state' => '',
            'post_code' => '',
            'dateof_birth' => '',
            'created_by' => 1,
            'profile_pic' => env('FILE_PATH').'/profile_pic/'.'default.png',
            'casemanagerid' => 3,
            'pattern' => '',
            'registered_on' => '',
            'logged_in_time' => '',
            'logged_out' => '',
            'active_status' => 0,
            'is_deleted' => 0
        ],
        [
            'user_id' => 4,
            'first_name' => "Agency",
            'last_name' => "User",
            'display_name' => "Agency User",
            'email' => 'agencyuser@appstekcorp.com',
            'phone_number' => '',
            'password' => '$2y$10$EdcPn4a8LRJp3pGk0oMKtuIwWAL4nl1tK3ALB.qpFnddgcWfsOLUy',
            'usertypeid' => 1,
            'case_manager' => 0,
            'addto_agency' =>0,
            'otp' => '',
            'city' => '',
            'state' => '',
            'post_code' => '',
            'dateof_birth' => '',
            'created_by' => 1,
            'profile_pic' => env('FILE_PATH').'/profile_pic/'.'default.png',
            'casemanagerid' => '',
            'pattern' => '',
            'registered_on' => '',
            'logged_in_time' => '',
            'logged_out' => '',
            'active_status' => 0,
            'is_deleted' => 0
        ]);
    }
}
