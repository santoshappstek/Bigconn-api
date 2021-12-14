<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'user_type';
	protected $primaryKey = 'usertype_id'; 
	protected $fillable = ['user_type'];
}
