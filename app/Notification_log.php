<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification_log extends Model
{
    protected $table = 'notification_log';
	protected $primaryKey = 'note_id'; 
	protected $fillable = ['user_id','sender_id','log_type','message','viewed_status','pn_status'];

	public function notification_log($note_id)
    {
        $notification_log=notification_log::find($note_id);
        return $notification_log;
    }
}
