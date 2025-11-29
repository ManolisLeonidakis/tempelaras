<?php

namespace App\Http\Controllers;

use App\Helpers\GreekSlugHelper;
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

    /**
     * Show professional by ID.
     */
    public function showById(int $userId): mixed
    {
        $user = User::findOrFail($userId);

        return $this->show($user);
    }

    /**
     * Show professionals by specialty and city using SEO-friendly URLs.
     */
    public function searchBySlug(Request $request, string $specialtySlug, ?string $citySlug = null): mixed
    {
        // Convert slugs back to Greek.
        $idikotita = GreekSlugHelper::slugToSpecialty($specialtySlug);
        $city = $citySlug ? GreekSlugHelper::slugToCity($citySlug) : null;

        // If slug not found, 404.
        if (!$idikotita || ($citySlug && !$city)) {
            abort(404);
        }

        $sort = $request->input('sort', 'name');

        $query = User::query();

        $query->where('idikotita', $idikotita);

        if ($city) {
            $query->where('city', $city);
        }

        // Apply sorting.
        switch ($sort) {
            case 'created_at':
                $query->orderBy('created_at', 'desc');
                break;
            case 'rating':
                $query->orderBy('created_at', 'desc');
                break;
            case 'name':
            default:
                $query->orderBy('name', 'asc');
                break;
        }

        $users = $query->paginate(20);

        // Build SEO meta tags.
        $title = $city ? "{$idikotita} στην περιοχή {$city}" : "Βρες {$idikotita} σε όλη την Ελλάδα";

        $description = $city ? "Αναζήτηση και επικοινωνία με έμπειρους {$idikotita} στην {$city}. Δες προφίλ, έργα και αξιολογήσεις επαγγελματιών." : "Αναζήτηση και επικοινωνία με έμπειρους {$idikotita} σε όλη την Ελλάδα. Δες προφίλ, έργα και αξιολογήσεις επαγγελματιών.";

        $canonicalUrl = $city ? route('find.specialty.city', ['specialty' => $specialtySlug, 'city' => $citySlug]) : route('find.specialty', ['specialty' => $specialtySlug]);

        return view('find.index', compact('users', 'idikotita', 'city', 'title', 'description', 'canonicalUrl'));
    }
}
