<?php

namespace AcessoWeb\Entities;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $connection = 'acesso_web';
    protected $table = 'empresa';
    protected $primaryKey = 'idEmp';

    public function users()
    {
        return $this->hasMany(\AcessoWeb\Entities\User::class, 'idEmp', 'idEmp');
    }

}
