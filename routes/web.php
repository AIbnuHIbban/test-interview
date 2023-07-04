<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConcertsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/page/{pages}', [AdminController::class, 'pages']);
    Route::get('/checkin/{code}', [TicketsController::class, 'checkin']);
});

Route::resource('customers', CustomersController::class);
Route::resource('tickets', TicketsController::class);
Route::resource('concerts', ConcertsController::class);

require __DIR__.'/auth.php';
