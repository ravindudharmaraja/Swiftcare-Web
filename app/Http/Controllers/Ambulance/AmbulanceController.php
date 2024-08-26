<?php

namespace App\Http\Controllers\Ambulance;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Vehicle;
use App\Models\EmergencyBooking;
use App\Models\Ambulance\Ambulance;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AmbulanceController extends Controller
{
    
    public function normalBooking()
    {
        $bookings = Booking::all();
        return view('ambulance.pages.normalBooking', ['bookings' => $bookings]);
    }
    public function emegencyBooking()
    {
        $emergencyBookings = EmergencyBooking::all();
        $ambulances = Ambulance::all();
        return view('ambulance.pages.emegencyBooking', ['emergencyBookings' => $emergencyBookings, 'ambulances' => $ambulances]);
    }
    
    public function myVehicle()
    {
        // Retrieve the authenticated ambulance
        $ambulance = Auth::guard('ambulance')->user();

        // Retrieve the associated vehicle details
        $vehicle = $ambulance->vehicle;

        // Pass the vehicle details to the view
        return view('ambulance.pages.myVehicle', ['vehicle' => $vehicle]);
    }

    public function makeAsBusy(Request $request)
    {
        // Get the authenticated user's ID
        $ambulanceId = auth()->id();

        // Find the ambulance associated with the user's ID
        $ambulance = Ambulance::find($ambulanceId);

        if (!$ambulance) {
            return response()->json(['error' => 'Ambulance not found.'], 422);
        }

        // Check if the ambulance is currently available, then change it to busy.
        if ($ambulance->status === 'available') {
            $ambulance->status = 'busy';
            $ambulance->save();
            return response()->json(['message' => 'Ambulance marked as busy successfully.']);
        }

        return response()->json(['error' => 'Ambulance is already marked as busy.']);
    }

    public function makeAsAvailable(Request $request)
    {
        // Get the authenticated user's ID
        $ambulanceId = auth()->id();

        // Find the ambulance associated with the user's ID
        $ambulance = Ambulance::find($ambulanceId);

        if (!$ambulance) {
            return response()->json(['error' => 'Ambulance not found.'], 422);
        }

        // Check if the ambulance is currently busy, then change it to available.
        if ($ambulance->status === 'busy') {
            $ambulance->status = 'available';
            $ambulance->save();
            return response()->json(['message' => 'Ambulance marked as available successfully.']);
        }

        return response()->json(['error' => 'Ambulance is already marked as available.']);
    }

     public function map()
    {
        $emergencyBookings = EmergencyBooking::all();
        return view('ambulance.pages.map', ['emergencyBookings' => $emergencyBookings]);
    }

   
    public function postDriver(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:ambulances,email',
            'password' => 'required|min:6',
            'vehicle_id' => 'required',
            'hospital_id' => 'required',


        ]);

        // Create a new ambulance associated with the user and the specified vehicle
        $ambulance = new Ambulance;
        $ambulance->name = $request->input('name');
        $ambulance->email = $request->input('email');
        $ambulance->password = bcrypt($validatedData['password']);
        $ambulance->vehicle_id = $request->input('vehicle_id');
        $ambulance->hospital_id = $request->input('hospital_id');


        $ambulance->save();

        // return response()->json(['message' => 'Ambulance created successfully', 'ambulance' => $ambulance], 201);
        return redirect()->back()->withInput()->with(['message' => 'Ambulance created successfully', 'ambulance' => $ambulance]);

    }
 
    public function getAllVehicles()
    {
        $vehicles = Vehicle::all();

        return response()->json($vehicles);
    }
}
