<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController as HomeAdmin;
use App\Http\Controllers\Backend\EmployeesController as Employees;
use App\Http\Controllers\Backend\LoginController as Login;
use App\Http\Controllers\Backend\AcountController as Account;

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
Route::get('/admin',[HomeAdmin::class,'show'])->name('homeadmin');
Route::get('/login', function () {
    return view('backend.auth.login');
});
Route::get('/register', function () {
    return view('backend.auth.register');
});

// login
Route::post('/check', [Login::class, 'checklogin'])->name('checklogin');

// employees
Route::get('/employees/{id}', [Employees::class, 'EmployeesByDept_ID'])->name('EmployeesByDept_ID');

Route::get('/showcreate', [Employees::class, 'show'])->name('showcreate');
Route::post('/createEmployees', [Employees::class, 'create'])->name('createEmployees');
Route::get('/createAcount', [Employees::class, 'show'])->name('createAcount');

// account
Route::get('/account/{id}/{message}', [Account::class, 'AccountByDept_ID'])->name('AccountByDept_ID');
Route::post('/createacount/{id}',[Account::class, 'create'])->name('createAcount');
Route::post('/editacount/{id}/{account_id}',[Account::class, 'edit'])->name('editAcount');
Route::get('/deleteacount/{id}/{account_id}',[Account::class, 'delete'])->name('deleteAccount');

