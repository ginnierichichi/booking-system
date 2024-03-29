<?php

use App\Http\Controllers\BookingController;
use App\Http\Livewire\CreateBooking;
use App\Http\Livewire\ShowBooking;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/bookings/create', CreateBooking::class);
Route::get('/bookings/{appointment:uuid}', ShowBooking::class)->name('bookings.show');
