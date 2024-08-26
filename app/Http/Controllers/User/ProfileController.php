<?php

namespace App\Http\Controllers\User;
use App\Models\User\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
     public function profileAccount()
    {
        $userId = Auth::id();
        $user = User::where('id', $userId)->first();

        return view('user.profile.partials.updateProfile', ['user' => $user]);
    }

    public function profilePassword()
    {
        return view('user.profile.partials.updatePassword');
    }

    public function updateAccount(Request $request)
    {
        $userId = Auth::id();
        $user = User::where('id', $userId)->first();

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // 'address' => 'nullable|string|max:255',
            // 'profileImage' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        // Update the user profile
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // $user->address = $request->input('address');

        // Handle profile picture upload
        $fieldName = 'profileImage'; 
        if ($request->hasFile($fieldName)) {
            $imageFile = $request->file($fieldName);
            $extension = $imageFile->getClientOriginalExtension();
            $filename = time() . "_image.$extension"; 
            $storagePath = 'Profiles/User/';
            $imageFile->move(public_path($storagePath), $filename);
            $fullImageUrl = asset($storagePath . $filename);

            $user->profile = $fullImageUrl; 
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    } 
  
    public function destroy(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $user->delete();

            // Logout the user (optional, depending on your requirements)
            Auth::logout();
        }

        return redirect('/');
    }
}
