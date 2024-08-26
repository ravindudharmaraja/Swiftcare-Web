<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\EmergencyBooking;
use App\Models\Hospital\Hospital;
use App\Models\Ambulance\Ambulance;




class HospitalController extends Controller
{
    

    public function newVehicle()
    {
        $userId = Auth::id();
        $vehicles = Vehicle::all();
        return view('hospital.pages.addVehicle', ['userId' => $userId, 'vehicles' => $vehicles]);
    }
    public function vehicle()
    {
        $userId = Auth::id();
        $vehicles = Vehicle::all();
        return view('hospital.pages.vehicle', ['userId' => $userId, 'vehicles' => $vehicles]);
    }
    public function postAmbulance(Request $request)
    {
        // Validate the form data
        // $request->validate([
        //     'title' => 'required',
        //     'overview' => 'required',
        //     'price' => 'required|numeric',
        //     'fuel' => 'required',
        //     'model' => 'required|numeric',
        //     'seatingcapacity' => 'required|numeric',
        //     // Add more validation rules for other fields
        // ]);

        // Check if a hospital user is authenticated
        if (Auth::guard('hospital')->check()) {
            $hospitalId = Auth::guard('hospital')->id();
        } else {
        }

        // Create a new Vehicle instance
        $vehicle = new Vehicle;
        $vehicle->hospital_id = $request->input('hospital_id');
        $vehicle->title = $request->input('title');
        $vehicle->brand = $request->input('brand');
        $vehicle->overview = $request->input('overview');
        $vehicle->year = $request->input('year');
        $vehicle->price = $request->input('price');
        $vehicle->fuel = $request->input('fuel');
        $vehicle->plate_number = $request->input('plate_number');
        $vehicle->capacity = $request->input('capacity');

        // Handle file uploads (images)
        foreach (range(1, 4) as $index) {
            $fieldName = "image$index";
            if ($request->hasFile($fieldName)) {
                $imageFile = $request->file($fieldName);
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time() . "_image$index.$extension";
                $storagePath = 'Vehicles/';
                $imageFile->move(public_path($storagePath), $filename);
                $fullImageUrl = asset($storagePath . $filename);

                $vehicle->{"image$index"} = $fullImageUrl;
            }
        }
        
        $vehicle->save();

        // Handle checkbox values (accessories)
        $accessories = ['airconditioner', 'powerdoorlocks', 'antilockbrakingsystem', 'brakeassist', 'powersteering', 'driverairbag', 'passengerairbag', 'powerwindows', 'cdplayer', 'centrallocking', 'crashsensor', 'leatherseats'];
        foreach ($accessories as $accessory) {
            $vehicle->$accessory = $request->has($accessory) ? 1 : 0;
        }

        $vehicle->save();

        return redirect()->back()->with('success', 'Vehicle posted successfully');
    }

    public function newDriver()
    {
        $userId = Auth::id();
        $vehicles = Vehicle::all();
        return view('hospital.pages.addDriver', ['userId' => $userId, 'vehicles' => $vehicles]);
    }
    public function driver()
    {
        $userId = Auth::id();
        $ambulances = Ambulance::all();
        return view('hospital.pages.driver', ['userId' => $userId, 'ambulances' => $ambulances]);
    }

    public function normalBooking()
    {
        $bookings = Booking::all();
        return view('hospital.pages.normalBooking', ['bookings' => $bookings]);
    }
    public function emegencyBooking()
    {
        $emergencyBookings = EmergencyBooking::all();
        $ambulances = Ambulance::all();
        return view('hospital.pages.emegencyBooking', ['emergencyBookings' => $emergencyBookings, 'ambulances' => $ambulances]);
    }

    public function getAllHospitals()
    {
        $hospitals = Hospital::all();

        return response()->json($hospitals);
    }


}
