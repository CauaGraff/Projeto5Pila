<?php

namespace App\Http\Controllers;

use App\Models\ContasPlanoContas;
use Illuminate\Http\Request;
use App\Models\LancamentoCaixa;
use App\Models\LancamentosCaixas;

class LancamentoCaixaController extends Controller
{
    /**
     * Exibe uma lista dos lançamentos de caixa.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lancamentos = LancamentosCaixas::all();
        return view('lancamentos-caixa.index', compact('lancamentos'));
    }

    /**
     * Mostra o formulário para criar um novo lançamento de caixa.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contas = ContasPlanoContas::all();
        return view('lancamentos-caixa.create', compact("contas"));
    }

    /**
     * Armazena um novo lançamento de caixa no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'data' => 'required|date',
            'historico' => 'required|string',
            'valor' => 'required|numeric',
            'tipo' => 'required|in:C,D',
            // Adicione outras regras de validação conforme necessário
        ]);

        // Criação do lançamento de caixa
        LancamentosCaixas::create($request->all());

        return redirect()->route('lancamentos-caixa.index')
            ->with('success', 'Lançamento de caixa criado com sucesso.');
    }

    /**
     * Mostra o formulário para editar um lançamento de caixa específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lancamento = LancamentosCaixas::findOrFail($id);
        return view('lancamentos-caixa.edit', compact('lancamento'));
    }

    /**
     * Atualiza o lançamento de caixa específico no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados do formulário
        $request->validate([
            'data' => 'required|date',
            'historico' => 'required|string',
            'valor' => 'required|numeric',
            'tipo' => 'required|in:C,D',
            // Adicione outras regras de validação conforme necessário
        ]);

        // Atualização do lançamento de caixa
        $lancamento = LancamentosCaixas::findOrFail($id);
        $lancamento->update($request->all());

        return redirect()->route('lancamentos-caixa.index')
            ->with('success', 'Lançamento de caixa atualizado com sucesso.');
    }

    /**
     * Exibe os detalhes de um lançamento de caixa específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lancamento = LancamentosCaixas::findOrFail($id);
        return view('lancamentos-caixa.show', compact('lancamento'));
    }

    /**
     * Remove um lançamento de caixa específico do banco de dados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lancamento = LancamentosCaixas::findOrFail($id);
        $lancamento->delete();

        return redirect()->route('lancamentos-caixa.index')
            ->with('success', 'Lançamento de caixa excluído com sucesso.');
    }
}
