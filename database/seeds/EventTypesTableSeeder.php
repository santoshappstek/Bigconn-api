<?php

use Illuminate\Database\Seeder;

class EventTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_types')->insert([
       	    'eventtype_id' => 1,
            'eventtype_shortdesc' => "OTE",
            'eventtype_fulldesc' => "One Time Event"
        ]);
        DB::table('event_types')->insert([
       	    'eventtype_id' => 2,
            'eventtype_shortdesc' => "RE",
            'eventtype_fulldesc' => "Recurring Event"
        ]);
        DB::table('event_types')->insert([
       	    'eventtype_id' => 3,
            'eventtype_shortdesc' => "MDE",
            'eventtype_fulldesc' => "Multi-Day Event"
        ]);
    }
}
