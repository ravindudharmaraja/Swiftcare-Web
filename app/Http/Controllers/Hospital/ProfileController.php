<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\Hospital\Hospital;
use App\Http\Requests\HospitalProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function profileAccount()
    {
        $userId = Auth::id();
        $hospital = Hospital::where('id', $userId)->first();

        return view('hospital.profile.partials.updateProfile', ['hospital' => $hospital]);
    }

    public function profilePassword()
    {
        return view('hospital.profile.partials.updatePassword');
    }

    public function updateAccount(Request $request)
    {
        $hospital = Auth::user();

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $hospital->id,
            'address' => 'nullable|string|max:255',
            // 'profileImage' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        // Update the user profile
        $hospital->name = $request->input('name');
        $hospital->email = $request->input('email');
        $hospital->address = $request->input('address');

        // Handle profile picture upload
        $fieldName = 'profileImage'; 
        if ($request->hasFile($fieldName)) {
            $imageFile = $request->file($fieldName);
            $extension = $imageFile->getClientOriginalExtension();
            $filename = time() . "_image.$extension"; 
            $storagePath = 'Profiles/';
            $imageFile->move(public_path($storagePath), $filename);
            $fullImageUrl = asset($storagePath . $filename);

            $hospital->profile = $fullImageUrl; 
        }

        $hospital->save();

        return back()->with('success', 'Profile updated successfully!');
    } 
  
    public function destroy(Request $request)
    {
        $hospital = Auth::user();

        if ($hospital) {
            $hospital->delete();

            // Logout the user (optional, depending on your requirements)
            Auth::logout();
        }

        return redirect('/');
    }
}
