<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public function empresaStatus()
	 {
		return $this->belongsTo('App\EmpresaStatus', 'status_id');
	 }
}


