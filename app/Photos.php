<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $table = 'photos';
	protected $primaryKey = 'photo_id'; 
	protected $fillable = ['photo_name','albumid'];

	public function photos($photo_id)
    {
        $photos=photos::find($photo_id);
        return $photos;
    }
}
