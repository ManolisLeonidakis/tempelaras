<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    public function test_blog_index_page_loads(): void
    {
        $response = $this->get('/posts');

        $response->assertStatus(200);
        $response->assertViewHas('posts');
    }

    public function test_authenticated_user_can_create_post(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $postData = [
            'title' => 'Test Post Title',
            'description' => 'Test post description',
            'body' => 'Test post body content',
        ];

        $response = $this->post('/posts', $postData);

        $response->assertRedirect();
        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post Title',
            'description' => 'Test post description',
            'body' => 'Test post body content',
            'user_id' => $user->id,
        ]);
    }

    public function test_post_show_page_loads(): void
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $response = $this->get('/posts/'.$post->slug);

        $response->assertStatus(200);
        $response->assertViewHas('post');
    }

    public function test_unauthenticated_user_cannot_create_post(): void
    {
        $postData = [
            'title' => 'Test Post Title',
            'description' => 'Test post description',
            'body' => 'Test post body content',
        ];

        $response = $this->post('/posts', $postData);

        $response->assertRedirect('/login');
    }

    public function test_user_can_edit_own_post(): void
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        $response = $this->get('/posts/'.$post->id.'/edit');

        $response->assertStatus(200);
        $response->assertViewHas('post');
    }

    public function test_user_cannot_edit_others_post(): void
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user2->id]);

        $this->actingAs($user1);

        $response = $this->get('/posts/'.$post->id.'/edit');

        $response->assertStatus(403);
    }

    public function test_blog_management_page_requires_authentication(): void
    {
        $response = $this->get('/profile/blog');

        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_access_blog_management(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/profile/blog');

        $response->assertStatus(200);
        $response->assertViewHas('posts');
    }
}
