<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParametroController;
use App\Http\Controllers\PlanoContasController;
use App\Http\Controllers\LancamentoCaixaController;

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
        Route::get("/", [UserController::class, "index"])->name("user.index");
        Route::get("/cadastrar", [UserController::class, "cadastrar"])->name("user.cadastrar");
        Route::post("/register", [UserController::class, "handelRegister"])->name("user.post.register");
        Route::get('/edit/{id}',  [UserController::class, "editar"])->name('user.edit');
        Route::get('/del/{id}',  [UserController::class, "deletar"])->name('user.del');
    });

    /**LANCAMENTOS CAIXA */
    Route::resource('lancamentos-caixa', LancamentoCaixaController::class);
    Route::put('lancamentos-caixa/{id}/baixa', [LancamentoCaixaController::class, 'baixa'])->name('lancamentos-caixa.baixa');
    Route::get('lancamentos-caixa/gerar-parcelas', [LancamentoCaixaController::class, 'gerarParcelas'])->name('lancamentos-caixa.parcelas');


    /**PLANO DE CONTAS */
    Route::resource('plano-contas', PlanoContasController::class);

    /**PARAMETROS SISTEMA */
    Route::resource('parametros', ParametroController::class);
});
