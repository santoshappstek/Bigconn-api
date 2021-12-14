<?php

use Illuminate\Database\Seeder;

class HomeScreensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('home_screens')->insert([
       	//     'screen_id' => 1,
        //     'title' => "Match Activities",
        //     'screen'=>"http://54.187.114.170:81/home/matchactivities.png",
        //     'order'=>1
        // ]);
        // DB::table('home_screens')->insert([
       	//     'screen_id' => 2,
        //     'title' => "BIGS Connect Community",
        //     'screen'=>"http://54.187.114.170:81/home/bigsconnectcommunity.png",
        //     'order'=> 2
        // ]);
        // DB::table('home_screens')->insert([
       	//     'screen_id' => 3,
        //     'title' => "Events",
        //     'screen'=>"http://54.187.114.170:81/home/events.png",
        //     'order'=> 3
        // ]);
        // DB::table('home_screens')->insert([
       	//     'screen_id' => 4,
        //     'title' => "BIGS Resources",
        //     'screen'=>"http://54.187.114.170:81/home/bigsresources.png",
        //     'order'=> 4
        // ]);
        // DB::table('home_screens')->insert([
       	//     'screen_id' => 5,
        //     'title' => "Photo Gallery",
        //     'screen'=>"http://54.187.114.170:81/home/photogallery.png",
        //     'order'=> 5
        // ]);
        // DB::table('home_screens')->insert([
       	//     'screen_id' => 6,
        //     'title' => "Discount Programs",
        //     'screen'=>"http://54.187.114.170:81/home/discountprograms.png",
        //     'order'=> 6
        // ]);
        DB::table('home_screens')->insert([
            'screen_id' => 7,
            'title' => "Match Activities",
            'screen'=>"http://54.187.114.170:81/home/matchactivities2.png",
            'order'=>7
        ]);
        DB::table('home_screens')->insert([
            'screen_id' => 8,
            'title' => "BIGS Connect Community",
            'screen'=>"http://54.187.114.170:81/home/bigsconnectcommunity2.png",
            'order'=> 8
        ]);
        DB::table('home_screens')->insert([
            'screen_id' => 9,
            'title' => "Events",
            'screen'=>"http://54.187.114.170:81/home/events2.png",
            'order'=> 9
        ]);
        DB::table('home_screens')->insert([
            'screen_id' => 10,
            'title' => "BIGS Resources",
            'screen'=>"http://54.187.114.170:81/home/bigsresources2.png",
            'order'=> 10
        ]);
        DB::table('home_screens')->insert([
            'screen_id' => 11,
            'title' => "Photo Gallery",
            'screen'=>"http://54.187.114.170:81/home/photogallery2.png",
            'order'=> 11
        ]);
        DB::table('home_screens')->insert([
            'screen_id' => 12,
            'title' => "Discount Programs",
            'screen'=>"http://54.187.114.170:81/home/discountprograms2.png",
            'order'=> 12
        ]);
    }
}
