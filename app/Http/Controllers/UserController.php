<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        echo "index user";
    }

    public function register()
    {
        return view("cadastrousuarios");
    }
    public function handelRegister(Request $request)
    {
        if (!empty($request)) {
            $user = $request->user;
            $password = $request->password;

            $erros = [];

            if (!$user) {
                $erros["user"] = "preencha o nome o usuario";
            }

            if (!$password || strlen($password) < 7) {
                $erros["password"] = "preencha uma senha com minimo 8 caracteres";
            }

            if (!empty($erros)) {
                return response()->json([
                    "type" => "erro",
                    "mensages" => $erros
                ]);
            }

            $newUser = new User();
            $newUser->user = $user;
            $newUser->password = password_hash($password, PASSWORD_DEFAULT);
            $newUser->type = 'A';
            if ($newUser->save()) {
                return response()->json([
                    "type" => "sucess",
                    "redirect" => route("home")
                ]);
            }
        }
    }
}
