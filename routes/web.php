<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FocacciaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
//middleware para que no se metan desde la url a las dis


Route::resource('focaccia', FocacciaController::class)->middleware('auth');
//recursos
Route::get('lista', [FocacciaController::class, 'index'])->name('lista');

Route::get('subir', [FocacciaController::class, 'create'])->name('subir');
require __DIR__.'/auth.php';
