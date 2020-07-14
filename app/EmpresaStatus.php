<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaStatus extends Model
{
    public $table='empresa_status';

    public function empresas()
	{
	  return $this->hasMany('App\Empresa', 'status_id');
	}
}
