<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
	public function users()
	{
	  return $this->hasMany('App\User', 'permission_id');
	}
}
