<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discounts extends Model
{
    protected $table = 'discounts';
	protected $primaryKey = 'discount_id'; 
	protected $fillable = ['program_name','partner_name','description','start_date','end_date','status','created_by'];
	// protected $casts = [
 //        'start_date' => 'datetime:m/d/Y', 
 //        'end_date' => 'datetime:m/d/Y',
 //        'created_at' => 'datetime:m/d/Y', 
 //        'updated_at' => 'datetime:m/d/Y',
 //    ];

	public function discounts($discount_id)
    {
        $discounts=discounts::find($discount_id);
        return $discounts;
    }
}

