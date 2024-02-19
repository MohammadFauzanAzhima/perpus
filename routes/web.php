<?php

use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataBookController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('index');
});

Route::resource('/books', BookController::class);

Route::resource('/booking', BookingController::class);

Route::resource('/databooks', DataBookController::class);

Route::resource('/adminbooking', AdminBookingController::class);

Route::resource('/index', DashboardController::class);

Route::resource('/admin/books', AdminBookController::class);