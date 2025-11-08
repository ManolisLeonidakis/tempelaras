<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WishlistTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_can_view_wishlist_page(): void
    {
        $response = $this->get(route('wishlist.index'));

        $response->assertStatus(200);
        $response->assertViewIs('wishlist.index');
    }

    public function test_guests_can_add_worker_to_wishlist(): void
    {
        $user = User::factory()->create();

        $response = $this->post(route('wishlist.toggle', $user));

        $response->assertRedirect();
        $this->assertContains($user->id, session('wishlist', []));
    }

    public function test_guests_can_remove_worker_from_wishlist(): void
    {
        $user = User::factory()->create();

        // Add to wishlist first
        session(['wishlist' => [$user->id]]);

        $response = $this->post(route('wishlist.toggle', $user));

        $response->assertRedirect();
        $this->assertNotContains($user->id, session('wishlist', []));
    }

    public function test_wishlist_toggle_returns_json_when_requested(): void
    {
        $user = User::factory()->create();

        $response = $this->postJson(route('wishlist.toggle', $user));

        $response->assertJson([
            'success' => true,
            'action' => 'added',
            'count' => 1,
            'in_wishlist' => true,
        ]);
    }

    public function test_wishlist_page_shows_saved_workers(): void
    {
        $user1 = User::factory()->create(['name' => 'John Doe']);
        $user2 = User::factory()->create(['name' => 'Jane Smith']);

        session(['wishlist' => [$user1->id, $user2->id]]);

        $response = $this->get(route('wishlist.index'));

        $response->assertStatus(200);
        $response->assertSee('John Doe');
        $response->assertSee('Jane Smith');
    }

    public function test_wishlist_count_endpoint_returns_correct_count(): void
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        session(['wishlist' => [$user1->id, $user2->id]]);

        $response = $this->getJson(route('wishlist.count'));

        $response->assertJson(['count' => 2]);
    }

    public function test_empty_wishlist_shows_empty_state(): void
    {
        $response = $this->get(route('wishlist.index'));

        $response->assertStatus(200);
        $response->assertSee('Δεν έχετε αγαπημένους επαγγελματίες');
    }
}
