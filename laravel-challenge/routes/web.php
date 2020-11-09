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
// Route::get('/company/create', ['uses' => 'CompanyController@create', 'as' => 'companies.create']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/company',[App\Http\Controllers\CompanyController::class,'index'])->name('company');
Route::get('/company/create',[App\Http\Controllers\CompanyController::class,'create'])->name('create');
Route::post('/company/store',[App\Http\Controllers\CompanyController::class,'store'])->name('company.store');
Route::post('/company/show',[App\Http\Controllers\CompanyController::class,'show'])->name('company.show');
Route::get('/company/edit/{id}',[App\Http\Controllers\CompanyController::class,'edit'])->name('company.edit');
Route::put('/company/update/{id}',[App\Http\Controllers\CompanyController::class,'update'])->name('company.update');
Route::get('/company/companydelete/{id}',[App\Http\Controllers\CompanyController::class,'deletecompany'])->name('company.deletecompany');



Route::get('/employee',[App\Http\Controllers\EmployeeController::class,'index'])->name('employee');
Route::get('/employee/create',[App\Http\Controllers\EmployeeController::class,'create'])->name('employee.create');
Route::post('/employee/store',[App\Http\Controllers\EmployeeController::class,'store'])->name('employee.store');
Route::post('/employee/show',[App\Http\Controllers\EmployeeController::class,'show'])->name('employee.show');
Route::get('/employee/edit/{id}',[App\Http\Controllers\EmployeeController::class,'edit'])->name('employee.edit');
Route::put('/employee/update/{id}',[App\Http\Controllers\EmployeeController::class,'update'])->name('employee.update');
Route::get('/employee/employeedelete/{id}',[App\Http\Controllers\EmployeeController::class,'deleteemployee'])->name('employee.deletecompany');





?>