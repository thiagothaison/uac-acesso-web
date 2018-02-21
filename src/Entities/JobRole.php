<?php

namespace AcessoWeb\Entities;

use Illuminate\Database\Eloquent\Model;

class JobRole extends Model
{
    protected $connection = 'acesso_web';
    protected $table = 'nivel_cargo';

    public function users()
    {
        return $this->hasMany(\AcessoWeb\Entities\User::class, 'nivelCargo', 'id');
    }

}
