<?php

namespace App\Http\Controllers;

use App\Models\PetReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetReportController extends Controller
{
    public function index()
    {
        $reports = PetReport::latest()->get();

        return view('pet_reports.index', compact('reports'));
    }

    public function create()
    {
        return view('pet_reports.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pet_name' => 'required|string|max:255',
            'species' => 'required|string',
            'other_species' => 'nullable|string|max:255',
            'breed' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:255',
            'age' => 'nullable|integer',
            'color' => 'required|string|max:255',
            'special_mark' => 'nullable|string',
            'photo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'lost_location' => 'required|string|max:255',
            'lost_date' => 'required|date',
            'description' => 'required|string',
            'contact_number' => 'required|string|max:20',
        ]);

        $photoPath = $request->file('photo')->store('pet_reports', 'public');

        PetReport::create([
            'user_id' => Auth::id(),
            'pet_name' => $validated['pet_name'],
            'species' => $request->species === 'Other'
                ? $request->other_species
                : $request->species,
            'breed' => $validated['breed'],
            'gender' => $validated['gender'],
            'age' => $validated['age'],
            'color' => $validated['color'],
            'special_mark' => $validated['special_mark'],
            'photo' => $photoPath,
            'lost_location' => $validated['lost_location'],
            'lost_date' => $validated['lost_date'],
            'description' => $validated['description'],
            'contact_number' => $validated['contact_number'],
            'status' => 'active',
        ]);

        return redirect()->route('pet-reports.index')
            ->with('success', 'Pet report created successfully.');
    }

    public function show(PetReport $petReport)
    {
        return view('pet_reports.show', compact('petReport'));
    }

    private function authorizeOwner(PetReport $petReport)
    {
        abort_if($petReport->user_id !== Auth::id(), 403);
    }

    public function edit(PetReport $petReport)
    {
        $this->authorizeOwner($petReport);

        return view('pet_reports.edit', compact('petReport'));
    }

    public function update(Request $request, PetReport $petReport)
    {
        $this->authorizeOwner($petReport);

        $validated = $request->validate([
            'pet_name' => 'required|string|max:255',
            'species' => 'required|string',
            'other_species' => 'nullable|string|max:255',
            'breed' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:255',
            'age' => 'nullable|integer',
            'color' => 'required|string|max:255',
            'special_mark' => 'nullable|string',
            'lost_location' => 'required|string|max:255',
            'lost_date' => 'required|date',
            'description' => 'required|string',
            'contact_number' => 'required|string|max:20',
            'status' => 'required|in:active,found',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('pet_reports', 'public');
        }

        $validated['species'] = $request->species === 'Other'
            ? $request->other_species
            : $request->species;

        unset($validated['other_species']);

        $petReport->update($validated);

        return redirect()->route('pet-reports.show', $petReport)
            ->with('success', 'Report updated successfully.');
    }

    public function destroy(PetReport $petReport)
    {
        $this->authorizeOwner($petReport);

        $petReport->delete();

        return redirect()->route('pet-reports.index')
            ->with('success', 'Report deleted successfully.');
    }

    public function markAsFound(PetReport $petReport)
    {
        $this->authorizeOwner($petReport);

        $petReport->update([
            'status' => 'found',
        ]);

        return redirect()
            ->route('pet-reports.show', $petReport)
            ->with('success', 'Pet has been marked as found.');
    }
}