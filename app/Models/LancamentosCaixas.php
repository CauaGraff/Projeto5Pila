<?php

namespace App\Models;

use App\Models\ContasPlanoContas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LancamentosCaixas extends Model
{
    use HasFactory;

    protected $table = 'lancamentos_caixas';


    protected $fillable = [
        "data",
        "historico",
        "valor",
        "tipo",
        "conta_id",
        "data_vencimento",
        "data_baixa",
        "juros",
        "acrescimos",
        "descontos"
    ];

    public function conta()
    {
        return $this->belongsTo(ContasPlanoContas::class, 'conta_id');
    }
}
