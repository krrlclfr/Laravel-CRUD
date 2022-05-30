<?php

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/employee', [App\Http\Controllers\EmployeeController::class, 'index']);
Route::get('/delete-employee/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy']);

Route::get('/add-employee', [App\Http\Controllers\EmployeeController::class, 'add_employee']);
Route::post('/add-employee', [App\Http\Controllers\EmployeeController::class, 'create_employee']);

Route::get('/edit-employee/{id}', [App\Http\Controllers\EmployeeController::class, 'edit_employee']);
Route::patch('/edit-employee/{id}', [App\Http\Controllers\EmployeeController::class, 'update_employee']);
