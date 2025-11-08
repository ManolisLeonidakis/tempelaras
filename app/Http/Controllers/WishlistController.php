<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = session('wishlist', []);
        $workers = collect();

        if (! empty($wishlist)) {
            $workers = User::whereIn('id', $wishlist)
                ->with(['abilities', 'projects'])
                ->get();
        }

        return view('wishlist.index', compact('workers'));
    }

    public function toggle(Request $request, User $user)
    {
        $wishlist = session('wishlist', []);

        if (in_array($user->id, $wishlist)) {
            // Remove from wishlist.
            $wishlist = array_diff($wishlist, [$user->id]);
            $action = 'removed';
        } else {
            // Add to wishlist.
            $wishlist[] = $user->id;
            $action = 'added';
        }

        session(['wishlist' => array_values($wishlist)]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'action' => $action,
                'count' => count($wishlist),
                'in_wishlist' => in_array($user->id, $wishlist),
            ]);
        }

        return back()->with('success', "Worker {$action} to wishlist");
    }

    public function add(User $user)
    {
        $wishlist = session('wishlist', []);

        if (! in_array($user->id, $wishlist)) {
            $wishlist[] = $user->id;
            session(['wishlist' => array_values($wishlist)]);
        }

        return back()->with('success', 'Worker added to wishlist');
    }

    public function remove(User $user)
    {
        $wishlist = session('wishlist', []);

        if (in_array($user->id, $wishlist)) {
            $wishlist = array_diff($wishlist, [$user->id]);
            session(['wishlist' => array_values($wishlist)]);
        }

        return back()->with('success', 'Worker removed from wishlist');
    }

    public function count()
    {
        $wishlist = session('wishlist', []);

        return response()->json([
            'count' => count($wishlist),
        ]);
    }
}
