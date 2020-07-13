<?php

namespace App;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pessoa extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'cpf', 'rg','email','user_wifi','pass_wifi','obs','tipo_id','status_id'
	 ];

	 public function pessoaTipo()
	 {
		return $this->belongsTo('App\PessoaTipo', 'tipo_id');
	 }
    public function pessoaStatus()
	 {
		return $this->belongsTo('App\PessoaStatus', 'status_id');
	 }

}
