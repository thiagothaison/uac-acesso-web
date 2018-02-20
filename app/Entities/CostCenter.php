<?php

namespace AcessoWeb\Entities;

use Illuminate\Database\Eloquent\Model;

class CostCenter extends Model
{
    protected $connection = 'acesso_web';
    protected $table = 'centrocusto';
    protected $primaryKey = 'idCtCusto';

    public function users()
    {
        return $this->hasMany(\AcessoWeb\Entities\User::class, 'idCtCusto', 'idCtCusto');
    }
}
