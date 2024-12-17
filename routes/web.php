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

Route::get('/', [SpkoController::class, 'index'])->name('layouts.index');
Route::get('/layouts/create', [SpkoController::class, 'create'])->name('layouts.create');
Route::post('/layouts', [SpkoController::class, 'store'])->name('layouts.store');
Route::get('/layouts/{id_spko}/edit', [SpkoController::class, 'edit'])->name('layouts.edit');
Route::put('/layouts/{id_spko}', [SpkoController::class, 'update'])->name('layouts.update');
Route::delete('/layouts/{id_spko}', [SpkoController::class, 'destroy'])->name('layouts.destroy');

Route::get('/layouts/{id_spko}/print', [SpkoController::class, 'print'])->name('layouts.print');
