<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

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


Route::get('/', [IndexController::class, 'showIndex']);
Route::get('/contribution', [IndexController::class, 'showContribution']);

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [IndexController::class, 'showProfile']);

    Route::get('/donation', [IndexController::class, 'showDonation']);
    Route::post('/preview-donation', [IndexController::class, 'previewDonation']);
    Route::post('/submit-donation', [IndexController::class, 'submitDonation']);
});


Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/register', [UserController::class, 'register']);


Route::get('/dashboard', [DashboardController::class, 'show']);
Route::get('/blessing', [DashboardController::class, 'showBlessing']);
Route::post('/blessing/add', [DashboardController::class, 'addBlessingType']);
Route::delete('/blessing/delete/{id}', [DashboardController::class, 'deleteBlessingType']);
Route::delete('/blessing/update/{id}', [DashboardController::class, 'updateBlessingType']);
Route::post('/blessing/update-order', [DashboardController::class, 'updateOrder']);
