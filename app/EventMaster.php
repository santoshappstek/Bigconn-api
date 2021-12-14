<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventMaster extends Model
{
    protected $table = 'event_master';
	protected $primaryKey = 'event_id'; 
	protected $fillable = ['eventtypeid','event_name'];

	public function event_master($event_id)
    {
        $event_master=event_master::find($event_id);
        return $event_master;
    }
}
