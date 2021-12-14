<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventDates extends Model
{
    protected $table = 'event_dates';
	protected $primaryKey = 'eventdate_id'; 
	protected $fillable = ['eventid'];

	public function event_dates($eventdate_id)
    {
        $event_dates=event_dates::find($eventdate_id);
        return $event_dates;
    }
}
