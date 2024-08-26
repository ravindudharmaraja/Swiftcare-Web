<?php

namespace App\Http\Controllers\Ambulance\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated ambulance's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->ambulance()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::AMBULANCE_HOME.'?verified=1');
        }

        if ($request->ambulance()->markEmailAsVerified()) {
            event(new Verified($request->ambulance()));
        }

        return redirect()->intended(RouteServiceProvider::AMBULANCE_HOME.'?verified=1');
    }
}
