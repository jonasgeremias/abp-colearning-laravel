<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaTipo extends Model
{	
	public $table='pessoa_tipo';

   public function users()
	{
	  return $this->hasMany('App\User', 'tipo_id');
	}
}
