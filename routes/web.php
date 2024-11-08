<?php

use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\MessageSentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

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

Route::get('/', [Logincontroller::class, 'login'])->name('login');
Route::post('/boradcast', [MessageSentController::class, 'broadcastChat'])->name('boradcast');
Route::post('/message', [LoginController::class, 'handleLogin'])->name('handleLogin');
Route::get('/chat', [ChatController::class, 'index'])->name('chat');
