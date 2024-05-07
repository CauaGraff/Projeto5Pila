<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContasPlanoContas extends Model
{
    protected $fillable = ['descricao', 'tipo', 'agrupamento'];

    public function lancamentos()
    {
        return $this->hasMany(LancamentosCaixas::class, 'conta_id');
    }
}
