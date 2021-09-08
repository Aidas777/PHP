<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VairuotojasController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'vairuotojass'], function(){
    Route::get('', [VairuotojasController::class, 'index'])->name('vairuotojas.index');
    Route::get('create', [VairuotojasController::class, 'create'])->name('vairuotojas.create');
    Route::post('store', [VairuotojasController::class, 'store'])->name('vairuotojas.store');
    Route::get('edit/{vairuotojas}', [VairuotojasController::class, 'edit'])->name('vairuotojas.edit');
    Route::post('update/{vairuotojas}', [VairuotojasController::class, 'update'])->name('vairuotojas.update');
    Route::post('delete/{vairuotojas}', [VairuotojasController::class, 'destroy'])->name('vairuotojas.destroy');
    Route::get('show/{vairuotojas}', [VairuotojasController::class, 'show'])->name('vairuotojas.show');
 });
 


