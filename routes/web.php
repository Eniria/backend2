<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
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
    dd(session('token'));
});

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login/verify', [AuthController::class, 'verify']);
Route::get('/notes', [NoteController::class, 'index']);
Route::post('/notes/create', [NoteController::class, 'create']);
