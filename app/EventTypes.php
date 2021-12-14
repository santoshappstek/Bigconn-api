<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTypes extends Model
{
    protected $table = 'event_types';
	protected $primaryKey = 'eventtype_id'; 
	protected $fillable = ['eventtype_shortdesc','eventtype_fulldesc'];

	public function event_types($eventtype_id)
    {
        $event_types=event_types::find($eventtype_id);
        return $event_types;
    }
}
