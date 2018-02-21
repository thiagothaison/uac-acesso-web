<?php

namespace AcessoWeb\Entities;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    protected $connection = 'acesso_web';
    protected $table = 'sistemas';
    protected $primaryKey = 'idSistema';
}
