<?php

use App\Http\Livewire\Password;
use App\Http\Livewire\AddPassword;
use App\Http\Livewire\UpdatePassword;
use Illuminate\Support\Facades\Route;

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
})->middleware(['guest']);

Route::middleware(['auth'])->name('password.')->group(function () {
    Route::get('/dashboard', Password::class)->name('index');
    Route::get('/password/create', AddPassword::class)->name('create');
    Route::get('/password/{password}/update', UpdatePassword::class)->name('update-item');
});


require __DIR__.'/auth.php';
