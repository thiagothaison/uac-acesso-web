<?php

namespace AcessoWeb\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $connection = 'acesso_web';
    protected $table = 'usuario';
    protected $primaryKey = 're';

    protected $hidden = [
        'senha',
    ];

    /*****/

    public function systems()
    {
        return $this->belongsToMany(\AcessoWeb\Entities\System::class, 'sistema_usuario', 'reUsuario', 'idSistema')->where('sistemas.idSistema', env('ACESSO_WEB_ID'));
    }

    public function job_role()
    {
        return $this->belongsTo(\AcessoWeb\Entities\JobRole::class, 'nivelCargo', 'id');
    }

    public function company()
    {
        return $this->belongsTo(\AcessoWeb\Entities\Company::class, 'idEmp', 'idEmp');
    }

    public function cost_center()
    {
        return $this->belongsTo(\AcessoWeb\Entities\CostCenter::class, 'idCtCusto', 'idCtCusto');
    }

    public function stocking_unit()
    {
        return $this->belongsTo(\AcessoWeb\Entities\StockingUnit::class, 'idLotac', 'idLotac');
    }

    public function block()
    {
        return $this->belongsTo(\AcessoWeb\Entities\Block::class, 're', 'reUsuario')
            ->where('bloqueio.idSistema', env('ACESSO_WEB_ID'))
            ->whereRaw('DATE(NOW()) BETWEEN bloqueio.dtInicio and bloqueio.dtFinal');
    }

    public function collaborator()
    {
        $this->connection = 'mysql';
        $relation = $this->belongsTo(\AcessoWeb\Entities\Collaborator::class, 're', 're_colab')
            ->where('colaborador.id_emp', $this->idEmp);
        $this->connection = 'acesso_web';
        return $relation;
    }

    /*****/

    public function getSystemAttribute()
    {
        return $this->systems()->first();
    }

    /*****/

    public function getAuthPassword()
    {
        return $this->senha;
    }

    /*****/

    public function getRememberToken()
    {
        return null; // not supported
    }

    public function setRememberToken($value)
    {
        // not supported
    }

    public function getRememberTokenName()
    {
        return null; // not supported
    }

    public function getPrimeiroNomeAttribute()
    {
        return explode(" ", $this->attributes['nome'])[0];
    }

    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
            parent::setAttribute($key, $value);
        }
    }

}
