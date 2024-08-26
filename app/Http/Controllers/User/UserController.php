<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Vehicle;
use Carbon\Carbon;

class UserController extends Controller
{
    public function booking()
    {
        $userId = Auth::id();
        $bookings = Booking::all();
        return view('user.pages.booking', ['userId' => $userId, 'bookings' => $bookings]);
    }
    public function newBooking()
    {
        $userId = Auth::id();
        $vehicles = Vehicle::all();
        return view('user.pages.addBooking', ['userId' => $userId, 'vehicles' => $vehicles]);
    }
    public function recentBooking()
    {
        $userId = Auth::id();
        $bookings = Booking::all();
        return view('user.pages.recentBooking', ['userId' => $userId, 'bookings' => $bookings]);
    }
    public function postBooking(Request $request)
    {
        // $request->validate([
        //     'user_id' => 'required|integer',
        //     'ambulance_id' => 'required|integer',
        //     'hospital_id' => 'required|integer',
        //     'date' => 'required|date',
        //     'time' => 'required|date_format:H:i',
        //     'is_emergency' => 'required|boolean',
        //     // Add more validation rules as needed
        // ]);

        // Determine if it's an emergency booking based on the checkbox
        $isEmergency = $request->has('is_emergency') ? 1 : 0;

        // Create a new booking record
        $booking = new Booking();
        $booking->user_id = $request->user_id;
        $booking->vehicle_id = $request->vehicle_id;
        $booking->hospital_id = $request->hospital_id;
        $booking->fromdate = $request->fromdate;
        $booking->todate = $request->todate;
        $booking->time = $request->time;
        $booking->message = $request->message;
        $booking->is_emergency = $isEmergency; 
        $booking->status = 'pending'; // Default status

        $startDate = Carbon::parse($request->fromdate);
        $endDate = Carbon::parse($request->todate);
        $days = $startDate->diffInDays($endDate);

        $vehicle = Vehicle::findOrFail($request->vehicle_id);
        $totalPrice = $days * $vehicle->price;

        $booking->price = $totalPrice;

        // Save the booking
        $booking->save();

        // Redirect to a confirmation page or bookings list page
        return response()->json(['message' => 'Booking created successfully']);             
    }

    public function payment()
    {
        $userId = Auth::id();
        $bookings = Booking::all();
        return view('user.pages.payment', ['userId' => $userId, 'bookings' => $bookings]);
    }

   public function checkout($bookingId)
    {
        $userId = Auth::id();
        $booking = Booking::findOrFail($bookingId);
        // PayHere credentials
        $merchantId = '1225272';
        $returnUrl = 'http://your-app.com/payhere/success';
        $cancelUrl = 'http://your-app.com/payhere/cancel';
        $notifyUrl = 'http://your-app.com/payhere/notification';
        $orderId = 'ORDER_ID'; // Generate a unique order ID for each transaction
        $items = $booking->id; 
        $currency = 'LKR';
        $amount = $booking->price;

        // Generate hash as per the PayHere documentation
        $merchantSecret = 'ODE5NTkyNTkyMzUwNjA2ODc3NzQxNjk5NzUxMTgzMzg2MzY4MjQw';
        $hash = strtoupper(
            md5(
                $merchantId .
                $orderId .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5($merchantSecret))
            )
        );
        
        return view('user.pages.checkout', compact(
            'userId',
            'booking',
            'merchantId',
            'returnUrl',
            'cancelUrl',
            'notifyUrl',
            'orderId',
            'items',
            'currency',
            'amount',
            'hash'
        ));
    }

    public function getAllBooking()
    {     
        $bookings = Booking::all();
        return response()->json($bookings);
    }
}
