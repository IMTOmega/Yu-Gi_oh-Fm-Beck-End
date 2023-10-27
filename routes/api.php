<?php

use App\Http\Controllers\CartaController;
use App\Http\Controllers\PersonagemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'sg'], function () {
    Route::get('/', function () {
        return 'API Em Funcionamento!!';
    });
    Route::get('/drop', function () {
        return view('dropList');
    });
    Route::get('/calculadora', function () {
        return view('calculadora');
    });
    Route::prefix('/persona')->group(function () {
        Route::get('/', [PersonagemController::class, 'index'])->name('persona.index');
        Route::post('/', [PersonagemController::class, 'store'])->name('persona.store');
    });
    Route::prefix('/card')->group(function () {
        Route::get('/', [CartaController::class, 'index'])->name('card.index');
        Route::post('/', [CartaController::class, 'store'])->name('card.store');
    });
    Route::post('login', 'AuthController@login');


    Route::group(['middleware' => 'JwtAuthec'], function () {
        Route::get('me', 'AuthController@ckeckToken');
        // Adicione suas rotas adicionais aqui, se necessário
    });
});
