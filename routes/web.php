<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JdtController;

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

Route::get('/dashboard', [JdtController::class, 'index'])->name('dashboard');

Route::get('/settings', [JdtController::class, 'settings'])->name('settings');

Route::post('/add/confirmation', [JdtController::class, 'addConfirmation'])->name('addConfirmation');
Route::post('/edit/confirmation/{id}', [JdtController::class, 'editConfirmation'])->name('editConfirmation');
Route::get('/delete/confirmation/{id}', [JdtController::class, 'deleteConfirmation'])->name('deleteConfirmation');

Route::post('/add/position', [JdtController::class, 'addPosition'])->name('addPosition');
Route::post('/edit/position/{id}', [JdtController::class, 'editPosition'])->name('editPosition');
Route::get('/delete/position/{id}', [JdtController::class, 'deletePosition'])->name('deletePosition');
