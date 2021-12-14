<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapters extends Model
{
    protected $table = 'chapters';
	protected $primaryKey = 'chapter_id'; 
	protected $fillable = ['chapter_name','description'];

	public function chapters($chapter_id)
    {
        $chapters=chapters::find($chapter_id);
        return $chapters;
    }
}
