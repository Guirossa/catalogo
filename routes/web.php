<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\FornecedoresController;

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

Route::get('catalogo/buscar',[CatalogoController::class,'buscar']);
Route::resource('catalogo',CatalogoController::class);

Route::get('catalogo/buscar',[CatalogoController::class,'buscar']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('fornecedores',[FornecedoresController::class]);