<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table = 'messages';
	protected $primaryKey = 'message_id'; 
	protected $fillable = ['sender_id','reciever_id'];

	public function messages($message_id)
    {
        $messages=messages::find($message_id);
        return $messages;
    }
}
