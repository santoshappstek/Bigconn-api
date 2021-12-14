<?php

use Illuminate\Database\Seeder;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albums')->insert([
       	    'album_id' => 0,
            'album_name' => "create album",
            'userid' => 1,
            'album_status' => 0,
            'created_at' => '',
            'updated_at' =>''
        ]);
    }
}
