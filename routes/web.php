<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;

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

Route::get('/usuarios/adicionar', [UserController::class, 'create'])->name('user.create');
Route::post('/usuarios/adicionar', [UserController::class, 'store'])->name('user.store');
Route::get('/usuarios', [UserController::class, 'index'])->name('user.index');
Route::get('/usuario/{id}', [UserController::class, 'show'])->name('user.show'); // the name identifies a route despite the own route value
Route::get('usuarios/editar/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/usuario/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('usuario/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');