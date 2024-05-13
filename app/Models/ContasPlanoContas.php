<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContasPlanoContas extends Model
{
    protected $table = 'contas_plano_contas';

    protected $fillable = ['descricao', 'tipo', 'agrupamento'];

    public function lancamentos()
    {
        return $this->belongsTo(LancamentosCaixas::class);
    }
}
