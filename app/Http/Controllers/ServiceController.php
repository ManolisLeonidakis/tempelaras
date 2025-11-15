<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Auth::user()->services;

        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'rate_type' => 'required|in:fixed,per_hour,per_square_meter,none',
            'rate_amount' => 'nullable|numeric|min:0|decimal:0,2',
            'rate_currency' => 'nullable|string|size:3|in:EUR,USD',
        ]);

        Auth::user()->services()->create($validated);

        return redirect()->route('services.index')->with('success', 'Η υπηρεσία δημιουργήθηκε επιτυχώς!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        $this->authorize('view', $service);

        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $this->authorize('update', $service);

        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $this->authorize('update', $service);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'rate_type' => 'required|in:fixed,per_hour,per_square_meter,none',
            'rate_amount' => 'nullable|numeric|min:0|decimal:0,2',
            'rate_currency' => 'nullable|string|size:3|in:EUR,USD',
        ]);

        $service->update($validated);

        return redirect()->route('services.index')->with('success', 'Η υπηρεσία ενημερώθηκε επιτυχώς!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $this->authorize('delete', $service);

        $service->delete();

        return redirect()->route('services.index')->with('success', 'Η υπηρεσία διαγράφηκε επιτυχώς!');
    }
}
