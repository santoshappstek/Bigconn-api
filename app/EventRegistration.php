<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    protected $table = 'event_registration';
	protected $primaryKey = 'register_id'; 
	protected $fillable = ['eventdateid','userid'];

	public function event_registration($register_id)
    {
        $event_registration=event_registration::find($register_id);
        return $event_registration;
    }
}
