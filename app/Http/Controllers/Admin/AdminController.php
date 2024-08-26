<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Hardcoded email and password for demo purposes
        $validCredentials = [
            'email' => 'admin@example.com',
            'password' => 'password123',
        ];

        if ($credentials === $validCredentials) {
            // Authentication successful
            Auth::guard('admin')->loginUsingId(1); // You can set any user ID
            return redirect()->route('admin.dashboard');
        } else {
            // Invalid credentials
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}