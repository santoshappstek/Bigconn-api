<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $table = 'notifications';
	protected $primaryKey = 'notify_id'; 
	protected $fillable = ['message','timezone','sent_date','created_by'];
	
	public function notifications($notify_id)
    {
        $notifications=notifications::find($notify_id);
        return $notifications;
    }
}
