<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UserController;
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

Route::get('/', [MainController::class, 'index'])
    ->middleware('auth')
    ->name('home');

Route::match(['get', 'post'], 'login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('records', [RecordController::class, 'index'])->name('records');
Route::match(['get', 'post'], 'record/add', [RecordController::class, 'recordCreation'])->name('record.create');
Route::get('users/{id}/delete', [RecordController::class, 'delete'])->name('record.delete');
Route::match(['get', 'post'], 'users/{id}/edit', [RecordController::class, 'update'])->name('record.update');
Route::match(['get', 'post'], 'record/edit', [RecordController::class, 'edit'])->name('record.edit');
Route::get('users/{id}', [RecordController::class, 'view'])->name('users.view');
Route::get('/home', array(App\Http\Controllers\HomeController::class, 'index'))->name('home');
