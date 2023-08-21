<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AttendanceController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/check-in', [AttendanceController::class, 'checkIn'])->name('checkin');
Route::get('/check-out', [AttendanceController::class, 'checkOut'])->name('checkout');
Route::get('/edit/{id}', [AttendanceController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [AttendanceController::class, 'update'])->name('update');
Route::get('/delete/{id}', [AttendanceController::class, 'delete'])->name('delete');