<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaStatus extends Model
{	
	public $table='pessoa_status';

   public function users()
	{
	  return $this->hasMany('App\User', 'status_id');
	}
}
