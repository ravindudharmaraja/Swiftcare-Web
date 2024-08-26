<?php

use App\Http\Controllers\Hospital\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Hospital\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Hospital\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Hospital\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Hospital\Auth\NewPasswordController;
use App\Http\Controllers\Hospital\Auth\PasswordController;
use App\Http\Controllers\Hospital\Auth\PasswordResetLinkController;
use App\Http\Controllers\Hospital\Auth\RegisteredUserController;
use App\Http\Controllers\Hospital\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hospital\ProfileController;
use App\Http\Controllers\Hospital\HospitalController;
use App\Models\Hospital\hospital;



// Route::middleware('guest')->group(function () {
Route::group(['middleware' => ['guest:hospital'], 'prefix' => 'hospital', 'as' => 'hospital.'], function() {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

// Route::middleware('auth')->group(function () {
Route::group(['middleware' => ['auth:hospital'], 'prefix' => 'hospital', 'as' => 'hospital.'], function() {
    Route::get('dashboard', function () {
        return view('hospital.dashboard');
    })->name('dashboard');

    Route::get('/profile/account', [ProfileController::class, 'profileAccount'])->name('profile.account');
    Route::get('/profile/password', [ProfileController::class, 'profilePassword'])->name('profile.password');
    Route::patch('/profile/account', [ProfileController::class, 'updateAccount'])->name('update-account');
    Route::post('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');



    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');


    Route::get('vehicle', [App\Http\Controllers\Hospital\HospitalController::class, 'vehicle'])->name('vehicle');

    Route::get('/normal-booking', [HospitalController::class, 'normalBooking'])->name('normal.booking');
    Route::get('/emegency-booking', [HospitalController::class, 'emegencyBooking'])->name('emegency.booking');



    Route::get('/vehicle', [HospitalController::class, 'vehicle'])->name('vehicle');
    Route::get('/new/vehicle', [HospitalController::class, 'newVehicle'])->name('new.vehicle');
    Route::post('/new/vehicle', [HospitalController::class, 'postVehicle'])->name('post.vehicle');

    
    Route::get('/driver', [HospitalController::class, 'driver'])->name('driver');
    Route::get('/new/driver', [HospitalController::class, 'newDriver'])->name('new.driver');

    Route::get('/profile/password', [ProfileController::class, 'profilePassword'])->name('profile.password');
    Route::get('/profile/account', [ProfileController::class, 'profileAccount'])->name('profile.account');

});
