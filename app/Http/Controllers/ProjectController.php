<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['user', 'images'])
            ->whereHas('user', function ($query) {
                if (!auth()->user()?->admin) {
                    $query->where('admin', false);
                }
            })
            ->latest()
            ->paginate(12);

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $project->load(['user', 'images']);

        return view('projects.show', compact('project'));
    }

    public function create()
    {
        return view('project.edit', [
            'user' => Auth::user(),
            'project' => null,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5120'],
        ]);

        $project = Project::create([
            'user_id' => Auth::id(),
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('projects', 'public');

                $project->images()->create([
                    'url' => $imagePath,
                ]);
            }
        }

        return redirect()->route('profile.edit')
            ->with('status', 'project-created');
    }

    public function destroy(Project $project)
    {
        // Ensure user owns the project.
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }

        // Delete project images from storage.
        foreach ($project->images as $image) {
            Storage::disk('public')->delete($image->url);
            $image->delete();
        }

        $project->delete();

        return redirect()->route('profile.edit')
            ->with('status', 'project-deleted');
    }
}
