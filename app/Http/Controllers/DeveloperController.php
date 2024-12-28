<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DeveloperController extends Controller
{
    // Display a listing of the developers
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $developers = Developer::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('headquarters', 'like', "%{$search}%");
        })
        ->orderBy('name', 'asc')
        ->paginate(10);

        return view('developers.index', compact('developers'));
    }

    // Show the form for creating a new developer
    public function create(): View
    {
        return view('developers.create');
    }

    // Store a newly created developer in storage
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'founded_year' => 'nullable|string|max:255',
            'headquarters' => 'nullable|string|max:255',
            'website' => 'nullable|url',
        ]);

        Developer::create($request->all());

        return redirect()->route('developers.index')->with('success', 'Developer created successfully.');
    }

    // Display the specified developer
    public function show(Developer $developer): View
    {
        return view('developers.show', compact('developer'));
    }

    // Show the form for editing the specified developer
    public function edit(Developer $developer): View
    {
        return view('developers.edit', compact('developer'));
    }

    // Update the specified developer in storage
    public function update(Request $request, Developer $developer): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'founded_year' => 'nullable|string|max:255',
            'headquarters' => 'nullable|string|max:255',
            'website' => 'nullable|url',
        ]);

        $developer->update($request->all());

        return redirect()->route('developers.index')->with('success', 'Developer updated successfully.');
    }

    // Remove the specified developer from storage
    public function destroy(Developer $developer): RedirectResponse
    {
        $developer->delete();

        return redirect()->route('developers.index')->with('success', 'Developer deleted successfully.');
    }
}
