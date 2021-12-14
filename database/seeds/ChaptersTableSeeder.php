<?php

use Illuminate\Database\Seeder;

class ChaptersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chapters')->insert([
       	    'chapter_id' => 1,
            //'chapter_number' => 'ch-0001',
            'chapter_name' => "chapter1",
            'description' => "New Chapter Description",
            'created_by' => 1
        ]);
    }
}
