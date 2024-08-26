<?php

namespace App\Http\Controllers\Ambulance;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the ambulance's profile form.
     */
    public function edit(Request $request): View
    {
        return view('ambulance.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the ambulance's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('ambulance.profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the ambulance's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('ambulanceDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $ambulance = $request->user();

        Auth::guard('ambulance')->logout();

        $ambulance->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
