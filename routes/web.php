<?php

use App\Http\Controllers\LoginController;
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

/**LOGIN */
Route::prefix("login")->group(function () {
    Route::get("/", [LoginController::class, "index"])->name("login");
    Route::post("/auth", [LoginController::class, "authenticate"])->name("login.auth");
    Route::get('/logout', [LoginController::class, "destroy"])->name('login.destroy');
});

/**DASHBORD */
Route::middleware(['auth'])->group(function () {

    Route::get("/", function () {
        return view("home");
    })->name("home");

    /**USUARIO */
    Route::prefix("usuario")->group(function () {
        Route::get("/cadastro", [UserController::class, "register"])->name("user.register");
        Route::post("/register", [UserController::class, "handelRegister"])->name("user.post.register");
    });
});
