<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JoinOutings extends Model
{
    protected $table = 'join_outings';
	protected $primaryKey = 'join_id'; 
	protected $fillable = ['organized_by','joined_userid'];

	public function join_outings($join_id)
    {
        $join_outings=join_outings::find($join_id);
        return $join_outings;
    }
}
