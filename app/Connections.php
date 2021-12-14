<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connections extends Model
{
    protected $table = 'connections';
	protected $primaryKey = 'connection_id'; 
	protected $fillable = ['sender_id','reciever_id'];

	public function connections($connection_id)
    {
        $connections=connections::find($connection_id);
        return $connections;
    }
}
