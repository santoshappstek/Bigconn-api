<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    protected $table = 'help';
	protected $primaryKey = 'help_id'; 
	protected $fillable = ['category','title','description'];

	public function help($help_id)
    {
        $help=help::find($help_id);
        return $help;
    }
}
