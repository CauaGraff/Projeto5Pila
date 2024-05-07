<?php

namespace App\Http\Controllers;

use App\Models\ContasPlanoContas;
use Illuminate\Http\Request;

class PlanoContasController extends Controller
{
    public function index()
    {
        $planosContas = ContasPlanoContas::all();
        return view('plano-contas.index', compact('planosContas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required',
            'tipo' => 'required',
            'agrupamento' => 'required'
        ]);

        ContasPlanoContas::create($request->all());

        return redirect()->route('plano-contas.index');
    }

    public function edit(ContasPlanoContas $planoConta)
    {
        return view('plano-contas.edit', ["conta" => $planoConta]);
    }

    public function update(Request $request, ContasPlanoContas $planoConta)
    {
        $request->validate([
            'descricao' => 'required',
            'tipo' => 'required',
            // Validar outras regras conforme necessário
        ]);

        $planoConta->update($request->all());

        return redirect()->route('plano-contas.index');
    }

    public function destroy(ContasPlanoContas $planoConta)
    {
        $planoConta->delete();

        return redirect()->route('plano-contas.index');
    }
}
