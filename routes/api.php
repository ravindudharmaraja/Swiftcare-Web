<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\EmergencyBookingController;
use App\Http\Controllers\Hospital\HospitalController;
use App\Http\Controllers\Ambulance\AmbulanceController;

use App\Http\Controllers\AuthController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/hospitals', [HospitalController::class, 'getAllHospitals']);
Route::post('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.show');
Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
Route::post('vehicle', [App\Http\Controllers\Hospital\HospitalController::class, 'postAmbulance'])->name('vehicle.submit');
Route::post('driver', [App\Http\Controllers\Ambulance\AmbulanceController::class, 'postDriver'])->name('driver.submit');
Route::get('/ambulance', [AmbulanceController::class, 'getAllVehicles']);
Route::get('/booking', [UserController::class, 'getAllBooking']);


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/user', [AuthController::class, 'getUserData'])->middleware('auth:sanctum');
Route::get('/user-specific-data', [AuthController::class, 'getUserSpecificData'])->middleware('auth:sanctum');


Route::post('/emergency-booking', [EmergencyBookingController::class, 'store']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user-emergency-bookings', [EmergencyBookingController::class, 'getUserEmergencyBookings']);
    // other authenticated routes
});
