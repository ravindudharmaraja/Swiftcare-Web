<?php

use App\Http\Controllers\User\Auth\AuthenticatedSessionController;
use App\Http\Controllers\User\Auth\ConfirmablePasswordController;
use App\Http\Controllers\User\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\User\Auth\EmailVerificationPromptController;
use App\Http\Controllers\User\Auth\NewPasswordController;
use App\Http\Controllers\User\Auth\PasswordController;
use App\Http\Controllers\User\Auth\PasswordResetLinkController;
use App\Http\Controllers\User\Auth\RegisteredUserController;
use App\Http\Controllers\User\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Models\Booking; 
use App\Models\User\User;



// Route::middleware('guest')->group(function () {
Route::group(['middleware' => ['guest:user']], function() {
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
Route::group(['middleware' => ['auth:user'],'prefix' => 'user', 'as' => 'user.'], function() {
    Route::get('dashboard', function () {
        $bookings = Booking::all();
        return view('user.dashboard', compact('bookings'));
    })->name('dashboard');

    Route::get('/profile/account', [ProfileController::class, 'profileAccount'])->name('profile.account');
    Route::get('/profile/password', [ProfileController::class, 'profilePassword'])->name('profile.password');
    Route::put('/profile/account', [ProfileController::class, 'updateAccount'])->name('update-account');
    Route::post('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');



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


    Route::get('/recent/booking', [UserController::class, 'recentBooking'])->name('recent.booking');
    Route::get('/new/booking', [UserController::class, 'newBooking'])->name('new.booking');
    Route::post('/new/booking', [UserController::class, 'postBooking'])->name('post.booking');
    Route::get('/payment', [UserController::class, 'payment'])->name('payment');
    Route::get('/checkout/{bookingId}', [UserController::class, 'checkout'])->name('checkout');


    Route::get('/profile/password', [ProfileController::class, 'profilePassword'])->name('profile.password');
    Route::get('/profile/account', [ProfileController::class, 'profileAccount'])->name('profile.account');

    Route::get('/emergencybooking', [UserController::class, 'emergencybooking'])->name('emergencybooking');

   
});