<?php

namespace App\Http\Controllers\Ambulance\Auth;

use App\Http\Controllers\Controller;
use App\Models\Ambulance\Ambulance;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('ambulance.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Ambulance::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'vehicle_no' => ['required', 'string', 'max:255'],
            'ambulance_size' => ['required', 'string', 'max:255'],
            // 'current_location' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],

        ]);

        $ambulance = Ambulance::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'vehicle_no' => $request->vehicle_no,
            'ambulance_size' => $request->ambulance_size,
            // 'current_location' => $request->current_location,
            'status' => $request->status,
        ]);

        event(new Registered($ambulance));

        Auth::guard('ambulance')->login($ambulance);

        return redirect(RouteServiceProvider::AMBULANCE_HOME);
    }
}
