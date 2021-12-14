<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPermissions extends Model
{
    protected $table = 'user_permissions';
	protected $primaryKey = 'userpermit_id'; 
	protected $fillable = ['userid','permissionid'];

	public function photos($userpermit_id)
    {
        $user_permissions=user_permissions::find($userpermit_id);
        return $user_permissions;
    }
}
