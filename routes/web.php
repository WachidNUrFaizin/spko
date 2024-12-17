<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpkoController;

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

Route::get('/spko', [SpkoController::class, 'index'])->name('spko.index');
//Route::get('/spko', [\App\Http\Controllers\SpkoController::class, 'index'])->name('spko.index');
Route::get('/spko/create', [SpkoController::class, 'create'])->name('spko.create');
Route::post('/spko', [SpkoController::class, 'store'])->name('spko.store');
Route::get('/spko/{id_spko}/edit', [SpkoController::class, 'edit'])->name('spko.edit');
Route::put('/spko/{id_spko}', [SpkoController::class, 'update'])->name('spko.update');
Route::delete('/spko/{id_spko}', [SpkoController::class, 'destroy'])->name('spko.destroy');

Route::get('/spko/{id_spko}/print', [SpkoController::class, 'print'])->name('spko.print');
