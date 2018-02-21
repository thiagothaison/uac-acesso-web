<?php

namespace AcessoWeb\Entities;

use Illuminate\Database\Eloquent\Model;

class StockingUnit extends Model
{
    protected $connection = 'acesso_web';
    protected $table = 'lotacao';
    protected $primaryKey = 'idLotac';

    public function users()
    {
        return $this->hasMany(\AcessoWeb\Entities\User::class, 'idLocat', 'idLotac');
    }

}
