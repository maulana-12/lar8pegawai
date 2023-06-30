<?php

use App\Http\Controllers\EmployeeController;
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


Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');
Route::get('/pegawai/create',  [EmployeeController::class, 'create'])->name('pegawai.create');
Route::post('/pegawai/insert', [EmployeeController::class, 'store'])->name('pegawai.store');
Route::get('/pegawai/{id}', [EmployeeController::class, 'show'])->name('pegawai.show');
Route::get('/pegawai/edit/{id}', [EmployeeController::class, 'edit'])->name('pegawai.edit');
Route::put('/pegawai/update/{id}', [EmployeeController::class, 'update'])->name('pegawai.update');
Route::get('/pegawai/delete/{id}', [EmployeeController::class, 'destroy'])->name('pegawai.delete');
