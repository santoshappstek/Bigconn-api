<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outings extends Model
{
    protected $table = 'outings';
	protected $primaryKey = 'outing_id'; 
	protected $fillable = ['outing_name'];

	public function outings($outing_id)
    {
        $outings=outings::find($outing_id);
        return $outings;
    }
}
