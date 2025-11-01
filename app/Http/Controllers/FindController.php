<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FindController extends Controller
{
    public function index(Request $request)
    {
        $idikotita = $request->input('idikotita');
        $city = $request->input('city');
        $sort = $request->input('sort', 'name');

        $query = User::query();

        if ($idikotita) {
            $query->where('idikotita', $idikotita);
        }

        if ($city) {
            $query->where('city', $city);
        }

        // Apply sorting.
        switch ($sort) {
            case 'created_at':
                $query->orderBy('created_at', 'desc');
                break;
            case 'rating':
                // Assuming we have a rating field, for now sort by created_at.
                $query->orderBy('created_at', 'desc');
                break;
            case 'name':
            default:
                $query->orderBy('name', 'asc');
                break;
        }

        $users = $query->paginate(20);

        return view('find.index', compact('users'));
    }

    public function show(User $user)
    {
        // Load related projects and abilities.
        $user->load(['projects', 'abilities']);

        return view('find.show', compact('user'));
    }
}
