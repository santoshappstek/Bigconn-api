<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnwantedUsers extends Model
{
    protected $table = 'unwanted_users';
	protected $primaryKey = 'unwanted_id'; 
	protected $fillable = ['sent_userid','unwanted_userid','active_status'];

	public function unwanted_users($unwanted_id)
    {
        $UnwantedUsers=UnwantedUsers::find($unwanted_id);
        return $UnwantedUsers;
    }
}
