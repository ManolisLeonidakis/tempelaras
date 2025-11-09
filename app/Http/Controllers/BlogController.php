<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(?User $user = null)
    {
        $posts = Post::when($user, function ($query) use ($user) {
            return $query->where('user_id', $user->id);
        })
            ->with('author')
            ->latest()
            ->paginate(12);

        return view('posts.index', compact('posts', 'user'));
    }

    public function show(Post $post)
    {
        $post->load('author');

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function blog()
    {
        $posts = Post::where('user_id', auth()->check() ? auth()->user()->id : null)
            ->with('author')
            ->latest()
            ->paginate(10);

        return view('profile.blog', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['title', 'description', 'body']);
        $data['user_id'] = auth()->user()->id;
        $data['slug'] = Str::slug($request->title);

        // Ensure unique slug
        $originalSlug = $data['slug'];
        $count = 1;
        while (Post::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $originalSlug.'-'.$count;
            $count++;
        }

        $post = Post::create($data);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');

            // Create new image record.
            $post->images()->create([
                'url' => $imagePath,
                'watchable_type' => Post::class,
                'watchable_id' => $post->id,
            ]);
        }

        return redirect()->route('posts.show', $post->slug)
            ->with('success', 'Το άρθρο δημιουργήθηκε επιτυχώς!');
    }

    public function edit(Post $post)
    {
        if ($post->user_id !== auth()->user()->id) {
            abort(403);
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== auth()->user()->id) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['title', 'description', 'body']);

        // Update slug only if title changed
        if ($request->title !== $post->title) {
            $data['slug'] = Str::slug($request->title);
            $originalSlug = $data['slug'];
            $count = 1;
            while (Post::where('slug', $data['slug'])->where('id', '!=', $post->id)->exists()) {
                $data['slug'] = $originalSlug.'-'.$count;
                $count++;
            }
        }

        $post->update($data);

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($post->image) {
                \Storage::delete('public/'.$post->image->url);
                $post->image->delete();
            }

            $imagePath = $request->file('image')->store('images', 'public');

            // Create new image record.
            $post->image()->create([
                'url' => $imagePath,
                'watchable_type' => Post::class,
                'watchable_id' => $post->id,
            ]);
        }

        return redirect()->route('posts.show', $post->slug)
            ->with('success', 'Το άρθρο ενημερώθηκε επιτυχώς!');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== auth()->user()->id) {
            abort(403);
        }

        // Delete image
        if ($post->image && file_exists(public_path($post->image))) {
            unlink(public_path($post->image));
        }

        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Το άρθρο διαγράφηκε επιτυχώς!');
    }
}
