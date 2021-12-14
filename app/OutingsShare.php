<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutingsShare extends Model
{
    protected $table = 'outings_share';
	protected $primaryKey = 'share_id'; 
	protected $fillable = ['outing_id','shared_by','shared_to'];

	// public function chapters($chapter_id)
 //    {
 //        $chapters=chapters::find($chapter_id);
 //        return $chapters;
 //    }
}
