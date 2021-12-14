<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    protected $table = 'resources';
	protected $primaryKey = 'resource_id '; 
	protected $fillable = ['title','description','files','active_status'];

	public function resources($resource_id)
    {
        $resources=resources::find($resource_id);
        return $resources;
    }
}

