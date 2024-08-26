<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmergencyBookingController;
use App\Http\Controllers\BotManController;

use App\Http\Controllers\PaymentController;

Route::get('/payhere/checkout', [PaymentController::class, 'initiatePayment']);
Route::post('/payhere/notification', [PaymentController::class, 'handlePaymentNotification']);




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
    $vehicles = Vehicle::all();
    return view('home.welcome', compact('vehicles'));
});
Route::match(['get', 'post'], '/botman', 'App\Http\Controllers\BotManController@handle');


Route::get('/services', function () {
    return view('home.pages.services');
})->name('services');

Route::get('/about', function () {
    return view('home.pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('home.pages.contact');
})->name('contact');

Route::get('/ambulance', function () {
    $vehicles = Vehicle::all();
    return view('home.pages.ambulance', compact('vehicles'));
})->name('ambulance');

Route::get('/ambulanceDetails/{id}', function ($id) {
    $vehicles = Vehicle::find($id);
    if (!$vehicles) {
        abort(404);
    }
    return view('home.pages.ambulanceDetails', compact('vehicles'));
})->name('ambulanceDetails');

Route::get('/booking/{id}', function ($id) {
    $userId = Auth::id();
    $vehicles = Vehicle::find($id);
    if (!$vehicles) {
        abort(404);
    }
    return view('home.pages.booking', compact('vehicles','userId'));
})->name('bookNow');





  

// Route::get('/vehicle', function () {
//     $vehicles = App\Models\Vehicle::all();
//     return view('home.pages.view_ambulance', compact('vehicles'));
// });

Route::get('/vehicle/{id}', function ($id) {
    
    $vehicle = Vehicle::find($id);
    if (!$vehicle) {
        abort(404);
    }
    return view('home.pages.view_ambulance', compact('vehicle'));
});

Route::get('/emergencybooking/step1', [EmergencyBookingController::class, 'step1'])->name('step1');
Route::post('/emergencybooking/step1', [EmergencyBookingController::class, 'postStep1'])->name('post.step1');
Route::get('/emergencybooking/step2', [EmergencyBookingController::class, 'step2'])->name('step2');
Route::post('/emergencybooking/step2', [EmergencyBookingController::class, 'postStep2'])->name('post.step2');
Route::get('/emergencybooking/final', [EmergencyBookingController::class, 'final'])->name('final.step');

Route::get('/emergencybooking/invoice', [EmergencyBookingController::class, 'calculatePriceAndGenerateInvoice'])->name('invoice');


Route::post('/cancel-booking', [EmergencyBookingController::class, 'cancelBooking'])->name('cancel.booking');
Route::post('/assign-ambulance', [EmergencyBookingController::class, 'assignAmbulance'])->name('assign.ambulance');
Route::post('/accept-request', [EmergencyBookingController::class, 'acceptRequest'])->name('accept.request');
Route::post('/cancel-request', [EmergencyBookingController::class, 'cancelRequest'])->name('cancel.request');







// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
require __DIR__.'/authuser.php';
require __DIR__.'/authadmin.php';
require __DIR__.'/authhospital.php';
require __DIR__.'/authambulance.php';


