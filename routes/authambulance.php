<?php

use App\Http\Controllers\Ambulance\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Ambulance\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Ambulance\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Ambulance\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Ambulance\Auth\NewPasswordController;
use App\Http\Controllers\Ambulance\Auth\PasswordController;
use App\Http\Controllers\Ambulance\Auth\PasswordResetLinkController;
use App\Http\Controllers\Ambulance\Auth\RegisteredUserController;
use App\Http\Controllers\Ambulance\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ambulance\AmbulanceController;
use App\Http\Controllers\Ambulance\ProfileController;

// Route::middleware('guest')->group(function () {
Route::group(['middleware' => ['guest:ambulance'], 'prefix' => 'ambulance', 'as' => 'ambulance.'], function() {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ;

    Route::post('register', [RegisteredUserController::class, 'store'])->name('register');

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
Route::group(['middleware' => ['auth:ambulance'], 'prefix' => 'ambulance', 'as' => 'ambulance.'], function() {
    Route::get('dashboard', function () {
        return view('ambulance.dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

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



    Route::get('/map', [AmbulanceController::class, 'map'])->name('map');
    Route::get('/myVehicle', [AmbulanceController::class, 'myVehicle'])->name('myVehicle');

    Route::get('/normal-booking', [AmbulanceController::class, 'normalBooking'])->name('normal.booking');
    Route::get('/emegency-booking', [AmbulanceController::class, 'emegencyBooking'])->name('emegency.booking');

    Route::get('/make-as-busy', [AmbulanceController::class, 'makeAsBusy'])->name('makeAsBusy');
    Route::get('/make-as-available', [AmbulanceController::class, 'makeAsAvailable'])->name('makeAsAvailable');


});
