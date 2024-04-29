<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view("cadastrousuarios", compact("usuarios"));
    }

    public function handelRegister(Request $request)
    {
        if (!empty($request)) {

            $idUsuario = $request->id;
            $user = $request->user;
            $password = $request->password;
            $tipoUsuario = $request->tipo;
            if (!$idUsuario) {
                $request->validate([
                    'user' => 'required',
                    'password' => 'required|min:8',
                    'tipo' => 'required'
                ], [
                    'user.required' => 'Preencha o campo usuario',
                    'password.required' => 'Preencha a senha',
                    'password.min' => 'Esse campo tem que ter no mínimo :min caracteres',
                    'tipo.required' => 'Selecione uma opção'
                ]);

                $vUser = User::where('user', $user)->first();

                if ($vUser) {
                    return redirect()->route('user.index')->withErrors(['error' => 'Usuario ' . $user . ' já existe']);
                }

                $newUser = new User();
                $newUser->user = $user;
                $newUser->password = password_hash($password, PASSWORD_DEFAULT);
                $newUser->type = $tipoUsuario;
                if ($newUser->save()) {
                    return redirect()->route('user.index')->with('success', 'Usuario Cadastrado');
                }
            } else {
                $request->validate([
                    'user' => 'required',
                    'password' => 'required|min:8',
                    'tipo' => 'required'
                ], [
                    'user.required' => 'Preencha o campo usuario',
                    'password.required' => 'Preencha a senha',
                    'password.min' => 'Esse campo tem que ter no mínimo :min caracteres',
                    'tipo.required' => 'Selecione uma opção'
                ]);
                $alterarUser = User::find($request->id);
                $alterarUser->user = $user;
                $alterarUser->password = password_hash($password, PASSWORD_DEFAULT);
                $alterarUser->type = $tipoUsuario;
                if ($alterarUser->save()) {
                    return redirect()->route('user.index')->with('success', 'Usuario Alterado');
                }
            }
        }
    }

    public function editar($id)
    {
        $usuario = User::find($id);
        $usuarios = User::all();

        if ($usuario) {
            return view('cadastrousuarios', compact('usuarios', 'usuario'));
        } else {
            redirect()->route('user.index');
        }
    }
}
