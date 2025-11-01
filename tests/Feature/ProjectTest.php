<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_project_create_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('projects.create'));

        $response->assertStatus(200);
    }

    public function test_user_can_create_project_with_images(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post(route('projects.store'), [
                'title' => 'Test Project',
                'description' => 'This is a test project description.',
                'images' => [
                    UploadedFile::fake()->image('project1.jpg'),
                    UploadedFile::fake()->image('project2.jpg'),
                ],
            ]);

        $response->assertRedirect(route('profile.edit'));
        $response->assertSessionHas('status', 'project-created');

        $this->assertDatabaseHas('projects', [
            'user_id' => $user->id,
            'title' => 'Test Project',
            'description' => 'This is a test project description.',
        ]);

        $project = Project::where('user_id', $user->id)->first();
        $this->assertCount(2, $project->images);

        Storage::disk('public')->assertExists($project->images->first()->url);
    }

    public function test_user_can_delete_their_own_project(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $user->id]);

        $image = UploadedFile::fake()->image('project.jpg');
        $imagePath = $image->store('projects', 'public');

        $project->images()->create([
            'url' => $imagePath,
        ]);

        $response = $this->actingAs($user)
            ->delete(route('projects.destroy', $project));

        $response->assertRedirect(route('profile.edit'));
        $response->assertSessionHas('status', 'project-deleted');

        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
        Storage::disk('public')->assertMissing($imagePath);
    }

    public function test_user_cannot_delete_another_users_project(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $otherUser->id]);

        $response = $this->actingAs($user)
            ->delete(route('projects.destroy', $project));

        $response->assertForbidden();
    }

    public function test_project_requires_title_and_description(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post(route('projects.store'), [
                'title' => '',
                'description' => '',
            ]);

        $response->assertSessionHasErrors(['title', 'description']);
    }

    public function test_guests_can_view_projects_index(): void
    {
        $user = User::factory()->create();
        Project::factory()->count(3)->create(['user_id' => $user->id]);

        $response = $this->get(route('projects.index'));

        $response->assertStatus(200);
        $response->assertViewIs('projects.index');
        $response->assertViewHas('projects');
    }

    public function test_guests_can_view_individual_project(): void
    {
        $user = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $user->id]);

        $response = $this->get(route('projects.show', $project));

        $response->assertStatus(200);
        $response->assertViewIs('projects.show');
        $response->assertViewHas('project');
        $response->assertSee($project->title);
        $response->assertSee($project->description);
    }

    public function test_project_show_page_displays_user_information(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'idikotita' => 'Electrician',
        ]);
        $project = Project::factory()->create(['user_id' => $user->id]);

        $response = $this->get(route('projects.show', $project));

        $response->assertStatus(200);
        $response->assertSee($user->name);
        $response->assertSee($user->idikotita);
    }
}
