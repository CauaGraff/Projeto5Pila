<?php

namespace App\Http\Controllers;

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
}
