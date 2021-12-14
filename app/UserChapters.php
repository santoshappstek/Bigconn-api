<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserChapters extends Model
{
    protected $table = 'user_chapters';
	protected $primaryKey = 'userchapter_id'; 
	protected $fillable = ['userid','chapterid'];

	public function user_chapters($userchapter_id)
    {
        $user_chapters=user_chapters::find($userchapter_id);
        return $user_chapters;
    }
}
