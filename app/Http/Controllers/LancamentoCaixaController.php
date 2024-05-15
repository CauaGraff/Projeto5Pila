<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Parametro;
use Illuminate\Http\Request;
use App\Models\LancamentoCaixa;
use App\Models\ContasPlanoContas;
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
        $lancamentos = LancamentosCaixas::all();
        return view('lancamentos-caixa.create', compact("contas", "lancamentos"));
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
        $novoLancamento = new LancamentosCaixas();
        $novoLancamento->data = $request->data;
        $novoLancamento->historico = $request->historico;
        $novoLancamento->valor = $request->valor;
        $novoLancamento->tipo = $request->tipo;
        $novoLancamento->conta_id = $request->conta_id;
        $novoLancamento->data_vencimento = $request->data;
        $novoLancamento->save();
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
        $contas = ContasPlanoContas::all();

        return view('lancamentos-caixa.edit', compact('lancamento', 'contas'));
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
    public function baixa($id)
    {
        $lancamento = LancamentosCaixas::findOrFail($id);
        $hoje = Carbon::now();

        if (!$lancamento->data_baixa) {
            $dataVencimento = Carbon::parse($lancamento->data_vencimento);
            $diasAtraso = $dataVencimento->diffInDays($hoje, false);

            $jurosParametro = Parametro::where('descricao', 'Juros')->first();
            $multaParametro = Parametro::where('descricao', 'Multa')->first();
            $descontoParametro = Parametro::where('descricao', 'Descontos')->first();

            $juros = 0;
            $multa = 0;
            $desconto = 0;

            if ($diasAtraso > 0) {
                // Calcular juros e multa
                if ($jurosParametro && $jurosParametro->p_v === 'P') {
                    $juros = $lancamento->valor * $jurosParametro->indice * $diasAtraso / 100;
                }
                if ($multaParametro && $multaParametro->p_v === 'P') {
                    $multa = $lancamento->valor * $multaParametro->indice / 100;
                }
            } elseif ($diasAtraso < 0) {
                // Calcular desconto
                if ($descontoParametro && $descontoParametro->p_v === 'P') {
                    $desconto = $lancamento->valor * $descontoParametro->indice / 100;
                }
            }

            $lancamento->data_baixa = $hoje;
            $lancamento->juros = $juros;
            $lancamento->acrescimos = $multa;  // Assumindo que multa é considerada como acréscimo
            $lancamento->descontos = $desconto;
            $lancamento->save();
        }

        return redirect()->route('lancamentos-caixa.index')->with('success', 'Lançamento baixado com sucesso!');
    }

    public function gerarParcelas()
    {
        return view('lancamentos-caixa.index');
    }
}
