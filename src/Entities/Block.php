<?php

namespace AcessoWeb\Entities;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $connection = 'acesso_web';
    protected $table = 'bloqueio';
    protected $primaryKey = 'reUsuario';
    protected $dates = [
        'dtInicio',
        'dtFinal'
    ];

    public function users()
    {
        return $this->hasMany(\AcessoWeb\Entities\User::class, 're', 'reUsuario')->where('bloqueio.idSistema');
    }

}
