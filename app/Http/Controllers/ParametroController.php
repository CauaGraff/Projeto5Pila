<?php

namespace App\Http\Controllers;

use App\Models\Parametro;
use Illuminate\Http\Request;

class ParametroController extends Controller
{
    public function index()
    {
        $parametros = Parametro::all();
        return view('parametros.index', compact('parametros'));
    }

    public function create()
    {
        return view('parametros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required',
            'indice' => 'required',
            'p_v' => 'required',
            'aplicacao' => 'required',
        ]);

        Parametro::create($request->all());

        return redirect()->route('parametros.index')->with('success', 'Parâmetro criado com sucesso.');
    }

    public function edit(Parametro $parametro)
    {
        return view('parametros.edit', compact('parametro'));
    }

    public function update(Request $request, Parametro $parametro)
    {
        $request->validate([
            'descricao' => 'required',
            'indice' => 'required',
            'p_v' => 'required',
            'aplicacao' => 'required',
        ]);

        $parametro->update($request->all());

        return redirect()->route('parametros.index')->with('success', 'Parâmetro atualizado com sucesso.');
    }

    public function destroy(Parametro $parametro)
    {
        $parametro->delete();

        return redirect()->route('parametros.index')->with('success', 'Parâmetro excluído com sucesso.');
    }
}
