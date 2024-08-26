<?php

namespace App\Http\Controllers\Ambulance\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->ambulance()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::AMBULANCE_HOME);
        }

        $request->ambulance()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
