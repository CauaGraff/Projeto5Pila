<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix("login")->group(function () {
    Route::get("/", function () {
        return "tlaçsdkjfaçlskdfj";
    });
});

//auth
Route::middleware([])->group(function () {
    Route::prefix("usuario")->group(function () {
        Route::get("/cadastro", [UserController::class, "register"])->name("user.register");
        Route::post("/register", [UserController::class, "handelRegister"])->name("user.post.register");
    });
});
