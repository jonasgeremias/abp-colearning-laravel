<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrestacaoContaStatus extends Model
{
	public  $table = 'prestacao_status';

    public function prestacaoConta()
    {
    	return $this->hasMany('App\PrestacaoConta', 'status_id');
    }
}

