<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrestacaoConta extends Model
{

	public function prestacaoConta()
	{
		return $this->belongsTo('App\PrestacaoContaStatus', 'status_id');
	}
}
