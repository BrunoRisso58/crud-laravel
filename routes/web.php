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

Route::prefix('usuarios')->name('user.')
    ->controller(UserController::class)
    ->middleware(['MyFirstMiddleware:admin'])
    ->group(function () {
        Route::get('/adicionar', 'create')->name('create');
        Route::post('/adicionar', 'store')->name('store');
        Route::get('/', 'index')->name('index');
        Route::get('/{user}', 'show')->name('show')->missing(function () { // erro de consulta no banco (não existe o user)
            return redirect()->route('user.index');
        });
        Route::get('/editar/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
});

Route::fallback(function () { // erro de rota não existente
    return redirect()->route('user.index');
});