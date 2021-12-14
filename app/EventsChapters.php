<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsChapters extends Model
{
    protected $table = 'events_chapters';
	protected $primaryKey = 'eventchapter_id'; 
	protected $fillable = ['eventid','chapterid'];

	public function events_chapters($eventchapter_id)
    {
        $events_chapters=events_chapters::find($eventchapter_id);
        return $events_chapters;
    }
}
