<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
<<<<<<< HEAD
use App\Http\Controllers\TransactionController;
=======
use App\Http\Controllers\RegistrationController;
>>>>>>> 40e9b01a73c22dc2f3ae161e8815efd0b47008de
use Illuminate\Support\Facades\Route;

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

Route::get('/about', function () {
    return view('about');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

// Create additional Routes below
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store']);

<<<<<<< HEAD
Route::get('/clients/add', [ClientController::class, 'create'])->middleware('auth');
Route::post('/clients', [ClientController::class, 'send'])->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/transactions',[TransactionController::class, 'index'])->name('transactions.index');
=======
Route::get('/clients/add', [ClientController::class, 'create']);
Route::post('/clients', [ClientController::class, 'send']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/register', [RegistrationController::class, 'create']);
Route::post('/register', [RegistrationController::class, 'send']);
>>>>>>> 40e9b01a73c22dc2f3ae161e8815efd0b47008de
