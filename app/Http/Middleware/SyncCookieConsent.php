<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SyncCookieConsent
{
    /**
     * Handle an incoming request.
     *
     * Sync cookie consent from browser cookie to session.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if cookie consent exists in browser cookie but not in session.
        if ($request->hasCookie('cookie_consent') && !session()->has('cookie_consent')) {
            $consentValue = $request->cookie('cookie_consent');

            // Store in session.
            session(['cookie_consent' => $consentValue]);
        }

        return $next($request);
    }
}
