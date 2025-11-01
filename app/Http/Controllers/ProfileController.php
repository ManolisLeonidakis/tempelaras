<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $validated = $request->validated();

        // Handle image upload.
        if ($request->hasFile('image')) {
            // Delete old image if exists.
            if ($user->image) {
                \Storage::delete('public/' . $user->image->url);
                $user->image->delete();
            }

            // Store new image.
            $imagePath = $request->file('image')->store('profile-images', 'public');

            // Create new image record.
            $user->image()->create([
                'url' => $imagePath,
                'watchable_type' => User::class,
                'watchable_id' => $user->id,
            ]);
        }

        // Handle address array.
        if (isset($validated['user_address'])) {
            $user->user_address = $validated['user_address'];
            unset($validated['user_address']);
        }

        // Remove image from validated data as it's handled separately.
        unset($validated['image']);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
