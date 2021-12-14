<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyLittle extends Model
{
    protected $table = 'mylittle';
	protected $primaryKey = 'mylittle_id'; 
	protected $fillable = ['first_name','last_name','match_start','userid'];

	public function photos($mylittle_id)
    {
        $mylittle=mylittle::find($mylittle_id);
        return $mylittle;
    }
}
