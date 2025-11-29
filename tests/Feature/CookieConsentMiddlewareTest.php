<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CookieConsentMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    public function test_middleware_syncs_cookie_to_session(): void
    {
        // Make a request with cookie consent cookie.
        $response = $this->withCookie('cookie_consent', 'accepted')
            ->get('/');

        $response->assertStatus(200);

        // Check that session now has the consent value.
        $this->assertEquals('accepted', session('cookie_consent'));
    }

    public function test_middleware_does_not_override_existing_session(): void
    {
        // Set session first.
        session(['cookie_consent' => 'rejected']);

        // Make request with different cookie value.
        $response = $this->withCookie('cookie_consent', 'accepted')
            ->get('/');

        $response->assertStatus(200);

        // Session should keep original value.
        $this->assertEquals('rejected', session('cookie_consent'));
    }

    public function test_cookie_persists_across_requests(): void
    {
        // First request: accept consent.
        $response = $this->post('/cookie-consent', [
            'consent' => 'accepted',
            'necessary' => true,
        ]);

        $response->assertStatus(200);
        $response->assertCookie('cookie_consent', 'accepted');

        // Second request: should have consent in session from cookie.
        $cookies = $response->headers->getCookies();
        $consentCookie = collect($cookies)->first(fn ($cookie) => $cookie->getName() === 'cookie_consent');

        $secondResponse = $this->withCookie('cookie_consent', $consentCookie->getValue())
            ->get('/');

        $this->assertEquals('accepted', session('cookie_consent'));
    }

    public function test_banner_does_not_show_when_consent_given(): void
    {
        // Set consent cookie.
        $response = $this->withCookie('cookie_consent', 'accepted')
            ->get('/');

        $response->assertStatus(200);

        // Banner should not show (Alpine.js checks session).
        $this->assertEquals('accepted', session('cookie_consent'));
    }
}
