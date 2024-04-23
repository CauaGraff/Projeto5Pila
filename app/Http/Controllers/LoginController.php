<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function index()
    {
        return view("login");
    }
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $request->validate([
            'user' => 'required',
            'password' => 'required|min:8'
        ], [
            'user.required' => 'Preencha o campo usuario',
            'password.required' => 'Preencha a senha',
            'password.min' => 'Esse campo tem que ter no mínimo :min caracteres'
        ]);

        $user = User::where('user', $request->input('user'))->first();

        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Usuario ou Senha incorreto']);
        }

        if (!password_verify($request->input('password'), $user->password)) {
            return redirect()->route('login')->withErrors(['error' => 'Usuario ou Senha incorreto']);
        }

        Auth::loginUsingId($user->id);

        return redirect()->route('home')->with('success', 'Logged in');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
