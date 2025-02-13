<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DomainController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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
    return view('domain-search');
});

Route::get('/api/check-domain', [DomainController::class, 'checkDomain']);
Route::get('/checkout', [DomainController::class, 'checkout']);
Route::post('/purchase', [DomainController::class, 'purchase']);
Route::get('/login', [LoginController::class, 'index'])->name('view.login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
