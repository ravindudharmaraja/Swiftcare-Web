<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital\Hospital;
use App\Models\EmergencyBooking;
use App\Notifications\EmergencyRequestNotification;
use Illuminate\Support\Facades\Notification;
use GuzzleHttp\Client;


class EmergencyBookingController extends Controller
{
    public function step1()
    {
        return view('home.pages.emergency.step1');
    }

    public function postStep1(Request $request)
    {
        $hospitals = Hospital::all();
        $emergencyBooking = new EmergencyBooking();
        $emergencyBooking->name = $request->name;
        $emergencyBooking->mobile = $request->mobile;
        $emergencyBooking->latitude = $request->latitude;
        $emergencyBooking->longitude = $request->longitude;
        $emergencyBooking->hospital_id = null;
        $emergencyBooking->ambulance_id = null;
        $emergencyBooking->save();

        // Set the emergency_booking_id in the session for later retrieval
        $request->session()->put('emergency_booking_id', $emergencyBooking->id);

        // Redirect to step2 with the booking details
        return view('home.pages.emergency.step2', compact('emergencyBooking', 'hospitals'));
    }

    public function step2()
    {
        $emergencyBooking = EmergencyBooking::find(session('emergency_booking_id'));
        $hospitals = Hospital::all();
        return view('home.pages.emergency.step2', compact('hospitals', 'emergencyBooking'));
    }

    public function postStep2(Request $request)
    {
        $this->validate($request, [
            'hospital_id' => 'required|exists:hospitals,id', 
        ]);

        // Retrieve the EmergencyBooking record based on the user's session or a unique identifier
        $emergencyBooking = EmergencyBooking::find($request->session()->get('emergency_booking_id'));
        
        if (!$emergencyBooking) {
            return response()->json(['error' => 'Booking record not found. Please start the booking process again.'], 422);
        }

        $emergencyBooking->hospital_id = $request->input('hospital_id');
        $emergencyBooking->save();

        return redirect()->route('final.step'); 
    }
    public function final()
    {
        
        $emergencyBooking = EmergencyBooking::find(session('emergency_booking_id'));
        $hospitals = Hospital::all();

        return view('home.pages.emergency.finalStep', compact('hospitals', 'emergencyBooking'));
    }

    public function assignAmbulance(Request $request)
    {

        $bookingId = $request->input('emergency_booking_id');
        $ambulanceId = $request->input('selected_ambulance');


        // Retrieve the EmergencyBooking record
        $emergencyBooking = EmergencyBooking::find($bookingId);

        if (!$emergencyBooking) {
            return response()->json(['error' => 'Booking record not found.'], 422);
        }

        // Update the ambulance_id field with the selected ambulance ID
        $emergencyBooking->ambulance_id = $ambulanceId;
        $emergencyBooking->status = 'requested';
        $emergencyBooking->progress = 2;
        $emergencyBooking->save();

        // You can add any additional logic here, like sending notifications or performing other actions related to the assignment.

        // Return a response (e.g., a success message)
        return response()->json(['message' => 'Ambulance assigned successfully.']);
    }

    public function acceptRequest(Request $request)
    {

        $bookingId = $request->input('booking_id');

        // Retrieve the EmergencyBooking record
        $emergencyBooking = EmergencyBooking::find($bookingId);

        if (!$emergencyBooking) {
            return response()->json(['error' => 'Booking record not found.'], 422);
        }
        if ($emergencyBooking->status == 'accepted') {
            return response()->json(['error' => 'Booking allredy accepted.'], 422);
        }

        // Update the ambulance_id field with the selected ambulance ID
        $emergencyBooking->status = 'accepted';
        $emergencyBooking->progress = 3;
        $emergencyBooking->save();

        // You can add any additional logic here, like sending notifications or performing other actions related to the assignment.

        // Return a response (e.g., a success message)
        return response()->json(['message' => 'Ambulance assigned successfully.']);
    }

    public function cancelRequest(Request $request)
    {
        $bookingId = $request->input('booking_id');

        $emergencyBooking = EmergencyBooking::find($bookingId);

        if (!$emergencyBooking) {
            return response()->json(['error' => 'Booking record not found.'], 422);
        }

        if ($emergencyBooking->status == 'accepted') {
            return response()->json(['error' => 'Booking cannot be canceled.'], 422);
        }

        $emergencyBooking->status = 'pending';
        $emergencyBooking->ambulance_id = null;
        $emergencyBooking->save();

        // You can add any additional logic here, like sending notifications or performing other actions related to a canceled booking.

        return response()->json(['message' => 'Booking has been canceled.']);
    }

    public function cancelBooking(Request $request)
    {
        $bookingId = $request->input('booking_id');

        $emergencyBooking = EmergencyBooking::find($bookingId);

        if (!$emergencyBooking) {
            return response()->json(['error' => 'Booking record not found.'], 422);
        }

        if ($emergencyBooking->status !== 'pending') {
            return response()->json(['error' => 'Booking cannot be canceled.'], 422);
        }

        $emergencyBooking->status = 'declined';
        $emergencyBooking->save();

        // You can add any additional logic here, like sending notifications or performing other actions related to a canceled booking.

        return response()->json(['message' => 'Booking has been canceled.']);
    }
     


    public function calculatePriceAndGenerateInvoice(Request $request)
    {
        $emergencyBooking = EmergencyBooking::find(session('emergency_booking_id'));
        $hospital = Hospital::find($emergencyBooking->hospital_id);    

        // Get user's location from the emergency booking
        $userLatitude = $emergencyBooking->latitude;
        $userLongitude = $emergencyBooking->longitude;

        // Get hospital's location
        $hospitalLatitude = $hospital->latitude;
        $hospitalLongitude = $hospital->longitude;

        // Calculate distance using Google Maps Distance Matrix API
        $client = new Client();
        $response = $client->request('GET', 'https://maps.googleapis.com/maps/api/distancematrix/json', [
            'query' => [
                'units' => 'metric',
                'origins' => $hospitalLatitude . ',' . $hospitalLongitude,
                'destinations' => $userLatitude . ',' . $userLongitude,
                'key' => env('GOOGLE_MAPS_API_KEY'),
            ],
        ]);

        // Decode the response JSON
        $distanceData = json_decode($response->getBody(), true);

        // Calculate the distance in kilometers
        $distanceInKm = $distanceData['rows'][0]['elements'][0]['distance']['value'] / 1000;

        $pricePerKm = 10; // Set your price per kilometer
        $price = $pricePerKm * $distanceInKm;

        // Return the calculated price as a JSON response
        return response()->json(['price' => $price], 200);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'hospital_id' => 'required|exists:hospitals,id',
            
            
        ]);

        // Create a new EmergencyBooking
        $emergencyBooking = new EmergencyBooking();
        $emergencyBooking->name = $request->name;
        $emergencyBooking->mobile = $request->mobile;
        $emergencyBooking->latitude = $request->latitude;
        $emergencyBooking->longitude = $request->longitude;
        $emergencyBooking->hospital_id = $request->hospital_id;
        $emergencyBooking->ambulance_id = null; 
        $emergencyBooking->user_id = $request->user_id; 
        $emergencyBooking->progress = 0; 
        $emergencyBooking->save();

        // Return a response
        return response()->json([
            'message' => 'Emergency booking created successfully.',
            'booking' => $emergencyBooking,
        ], 201);
    }

    public function getUserEmergencyBookings(Request $request)
    {
        // Retrieve the authenticated user
        $user = $request->user();

        // Check if the user is authenticated
        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        // Fetch emergency bookings associated with the user
        $emergencyBookings = EmergencyBooking::where('user_id', $user->id)->get();

        // Check if any records are found
        if ($emergencyBookings->isEmpty()) {
            return response()->json(['message' => 'No emergency bookings found'], 404);
        }

        return response()->json($emergencyBookings);
    }


}
