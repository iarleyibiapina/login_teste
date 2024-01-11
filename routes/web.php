<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesterController;
use App\Http\Controllers\OutroController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 
Route::get('/cadastro', [CadastroController::class, 'Index'])->name("cadastro");
Route::post('/cadastro-cep', [CadastroController::class, 'pegarCEP'])->name("cadastroCep");
// 


Route::get('login', function () {
    return view('indexLogin');
})->name('login');

Route::resource('category', CategoryController::class);

Route::get('user', function () {
    return view("createRegisterUser");
});

// 
Route::controller(TesterController::class)->as('teste.')->group(function () {
    Route::get('/return-get-teste', 'index')->name('Index');
    Route::post('/return-post-teste', 'store')->name('Store');
});


Route::get("/tentandoEntrar", [OutroController::class, 'index'])->middleware("auth");
