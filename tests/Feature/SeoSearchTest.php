<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeoSearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_seo_friendly_specialty_route_works(): void
    {
        // Create a professional with specialty.
        User::factory()->create([
            'idikotita' => 'Υδραυλικός',
            'city' => 'Λάρισα',
        ]);

        $response = $this->get('/vrikes-mastora/ydraulikos');

        $response->assertStatus(200);
        $response->assertSee('Υδραυλικός');
    }

    public function test_seo_friendly_specialty_and_city_route_works(): void
    {
        // Create professionals.
        User::factory()->create([
            'idikotita' => 'Υδραυλικός',
            'city' => 'Λάρισα',
        ]);

        User::factory()->create([
            'idikotita' => 'Υδραυλικός',
            'city' => 'Αθήνα',
        ]);

        $response = $this->get('/vrikes-mastora/ydraulikos/larisa');

        $response->assertStatus(200);
        $response->assertSee('Υδραυλικός');
        $response->assertSee('Λάρισα');
    }

    public function test_invalid_specialty_slug_returns_404(): void
    {
        $response = $this->get('/vrikes-mastora/invalid-specialty');

        $response->assertStatus(404);
    }

    public function test_invalid_city_slug_returns_404(): void
    {
        $response = $this->get('/vrikes-mastora/ydraulikos/invalid-city');

        $response->assertStatus(404);
    }

    public function test_canonical_url_is_present(): void
    {
        User::factory()->create([
            'idikotita' => 'Υδραυλικός',
            'city' => 'Λάρισα',
        ]);

        $response = $this->get('/vrikes-mastora/ydraulikos/larisa');

        $response->assertStatus(200);
        $response->assertSee('rel="canonical"', false);
    }

    public function test_search_sitemap_includes_specialty_city_combinations(): void
    {
        $response = $this->get('/sitemap-search.xml');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/xml; charset=UTF-8');
        $response->assertSee('vrikes-mastora/ydraulikos/larisa');
        $response->assertSee('vrikes-mastora/ilektrologos/athina');
    }

    public function test_professional_profile_still_works_with_numeric_id(): void
    {
        $user = User::factory()->create([
            'idikotita' => 'Υδραυλικός',
            'city' => 'Λάρισα',
        ]);

        $response = $this->get("/vrikes-mastora/{$user->id}");

        $response->assertStatus(200);
        $response->assertSee($user->name);
    }
}
