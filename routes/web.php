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
Route::get('/prayer', [IndexController::class, 'showPrayer']);

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [IndexController::class, 'showProfile']);
});

Route::get('/donation', [IndexController::class, 'showDonation']);
Route::post('/preview-donation', [IndexController::class, 'previewDonation']);
Route::post('/submit-donation', [IndexController::class, 'submitDonation']);
Route::get('/thankyou', [IndexController::class, 'thankyou'])->name('thankyou');


Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/register', [UserController::class, 'register']);

Route::get('forgot-password', [UserController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('forgot-password', [UserController::class, 'submitForgotPasswordForm'])->name('password.email');
Route::get('reset-password/{token}', [UserController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('reset-password', [UserController::class, 'submitResetPasswordForm'])->name('password.update');


// -------------------------------------  Dashboard routes ------------------------------------- //

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'show']);
    Route::get('/dashboard/form-details/{userFormId}', [DashboardController::class, 'showFormDetails'])->name('dashboard.showFormDetails');
    Route::get('/dashboard/full-details/{userFormId}', [DashboardController::class, 'showFullDetails'])->name('dashboard.showFullDetails');

    Route::get('/dashboard/prayers', [DashboardController::class, 'showPrayers']);
    Route::post('/dashboard/prayers/add', [DashboardController::class, 'addPrayerType']);
    Route::delete('/dashboard/prayers/delete/{id}', [DashboardController::class, 'deletePrayerType']);
    Route::delete('/dashboard/prayers/update/{id}', [DashboardController::class, 'updatePrayerType']);
    Route::post('/dashboard/prayers/update', [DashboardController::class, 'updatePrayer']);
    Route::get('/dashboard/prayers/view/{id}', [DashboardController::class, 'viewBlessingType'])->name('viewBlessingType');
    Route::get('/dashboard/prayer-answer', [DashboardController::class, 'showPrayerAnswer'])->name('print.answers');
    Route::post('/dashboard/prayer-answer/download', [DashboardController::class, 'downloadPrayerAnswer']);

    Route::get('/dashboard/donation-submissions', [DashboardController::class, 'showDonationSubmissions'])->name('donation.submissions');

    Route::get('/dashboard/users', [DashboardController::class, 'showUsers'])->name('dashboard.users');

    Route::get('/dashboard/gallery-upload', [DashboardController::class, 'showGalleryUploadForm'])->name('dashboard.gallery.upload.form');
    Route::post('/dashboard/gallery-upload', [DashboardController::class, 'uploadGalleryImage'])->name('dashboard.gallery.upload');

    Route::get('/dashboard/gallery-edit/{id}', [DashboardController::class, 'showEditGalleryImageForm'])->name('dashboard.gallery.edit');
    Route::post('/dashboard/gallery-update/{id}', [DashboardController::class, 'updateGalleryImage'])->name('dashboard.gallery.update');
    Route::delete('/dashboard/gallery-delete/{id}', [DashboardController::class, 'deleteGalleryImage'])->name('dashboard.gallery.delete');
});
