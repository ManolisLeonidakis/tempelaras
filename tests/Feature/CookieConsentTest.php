<?php

namespace Tests\Feature;

use Tests\TestCase;

class CookieConsentTest extends TestCase
{
    public function test_cookie_consent_can_be_accepted(): void
    {
        $response = $this->post('/cookie-consent', [
            'consent' => 'accepted',
            'necessary' => true,
            'analytics' => false,
            'marketing' => false,
        ]);

        $response->assertStatus(200)
            ->assertJson(['success' => true]);
    }

    public function test_cookie_consent_can_be_rejected(): void
    {
        $response = $this->post('/cookie-consent', [
            'consent' => 'rejected',
            'necessary' => true,
            'analytics' => false,
            'marketing' => false,
        ]);

        $response->assertStatus(200)
            ->assertJson(['success' => true]);
    }

    public function test_cookie_consent_validation(): void
    {
        $response = $this->post('/cookie-consent', [
            'consent' => 'invalid',
        ]);

        $response->assertStatus(302); // Redirect due to validation error.
    }
}
