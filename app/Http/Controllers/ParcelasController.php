<?php

namespace App\Http\Controllers;

use App\Models\ContasPlanoContas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\LancamentosCaixas;

class ParcelasController extends Controller
{

    public function index()
    {
        $contas = ContasPlanoContas::all();
        return view("lancamentos-caixa.parcelas", compact("contas"));
    }

    public function gerarParcelas(Request $request)
    {
        $parcelas = $request->input('parcelas', 1);
        LancamentosCaixas::create([
            'data' => $request->data,
            'historico' => $request->historico . ' - Entrada',
            'valor' =>  $request->valorE,
            'tipo' => $request->tipo,
            'conta_id' => $request->conta_id,
            'data_vencimento' => $request->data,
            'data_baixa' => $request->data,
            'juros' => 0.00,
            'acrescimos' => 0.00,
            'descontos' => 0.00,
        ]);

        if ($parcelas > 1) {
            $valorParcela = ($request->valorT - $request->valorE) / $parcelas;
            $dataVencimento = Carbon::parse($request->data_vencimento);

            for ($i = 1; $i <= $parcelas; $i++) {
                $novaDataVencimento = $dataVencimento->copy()->addMonths($i - 1);

                LancamentosCaixas::create([
                    'data' => $request->data,
                    'historico' => $request->historico . ' - Parcela ' . $i,
                    'valor' => $valorParcela,
                    'tipo' => $request->tipo,
                    'conta_id' => $request->conta_id,
                    'data_vencimento' => $novaDataVencimento,
                    'data_baixa' => null,
                    'juros' => 0.00,
                    'acrescimos' => 0.00,
                    'descontos' => 0.00,
                ]);
            }
        }

        return redirect()->route('lancamentos-caixa.index')->with('success', 'Parcelas geradas com sucesso!');
    }
}
