<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; 
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function create(Request $request)
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
        
        // Calculate the price based on the date range and the vehicle's price
        $startDate = Carbon::parse($request->fromdate);
        $endDate = Carbon::parse($request->todate);
        $days = $startDate->diffInDays($endDate);

        $vehicle = Vehicle::findOrFail($request->vehicle_id);
        $totalPrice = $days * $vehicle->price;

        $booking->price = $totalPrice;

        $booking->status = 'pending'; // Default status

        // Save the booking
        $booking->save();

        // Redirect to a confirmation page or bookings list page
        return redirect()->route('user.booking')->with('success', 'Booking created successfully');
    }

    // View a specific booking
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        // Return a view with the booking details or send JSON response
    }

    // List all bookings
    public function index()
    {
        $bookings = Booking::all();
        // Return a view or JSON response with a list of bookings
        return $bookings;
    }

    // Update booking status (e.g., accept or decline)
    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = $request->status; // Update status
        $booking->save();
        // Redirect or return a response as needed
    }

    public function destroy($id)
    {
        try {
            $booking = Booking::findOrFail($id);
            $booking->delete();
            return response()->json(['message' => 'Booking deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete the booking'], 500);
        }
    }
    
}
