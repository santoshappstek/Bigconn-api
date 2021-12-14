<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    protected $table = 'albums';
	protected $primaryKey = 'album_id'; 
	protected $fillable = ['album_name','userid'];

	public function albums($album_id)
    {
        $albums=albums::find($album_id);
        return $albums;
    }
}
