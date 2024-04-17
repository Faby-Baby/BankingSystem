<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientAccountController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\RegistrationController;
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
Route::get('/logout', [AuthController::class, 'logout']);

//client routes
    
Route::get('/clients/add', [ClientController::class, 'create']);
Route::post('/clients', [ClientController::class, 'send']);

Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/client/accounts/{accountId}/transactions', [TransactionController::class, 'trans'])->name('client.transactions');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('client.dash');

Route::get('/register', [RegistrationController::class, 'create']);
Route::post('/register', [RegistrationController::class, 'send']);


Route::get('/client/accounts/create', [ClientAccountController::class, 'create'])->name('client.create.account');
Route::post('/client/accounts/store', [ClientAccountController::class, 'store'])->name('client.store.account');
Route::get('/client/support', [ClientController::class, 'help'])->name('client.support');




Route::get('/employee/clients', [EmployeeController::class, 'index'])->name('employee.clients');
Route::get('/employee/clients/{clientId}', [EmployeeController::class, 'show'])->name('employee.clients.show');

Route::get('/employee/clients/{clientId}/edit', [EmployeeController::class, 'edit'])->name('employee.clients.edit');
Route::put('/employee/clients/{clientId}', [EmployeeController::class, 'update'])->name('employee.clients.update');

Route::get('/employee/accounts/{accountId}/close', [EmployeeController::class, 'confirmCloseAccount'])->name('employee.accounts.confirmClose');
Route::delete('/employee/accounts/{accountId}', [EmployeeController::class, 'closeAccount'])->name('employee.accounts.close');



Route::get('/client/support', [ClientController::class, 'help'])->name('client.support');
