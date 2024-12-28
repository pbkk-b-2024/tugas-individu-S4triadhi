<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GenreController extends Controller
{
    // Display a listing of genres, with search and pagination
    public function index(Request $request): View
    {
        $search = $request->input('search');

        $genres = Genre::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('description', 'like', "%{$search}%");
        })
        ->orderBy('name', 'asc')
        ->paginate(10); // Paginate the results with 10 items per page

        return view('genres.index', compact('genres'));
    }

    // Show the form for creating a new genre
    public function create(): View
    {
        return view('genres.create');
    }

    // Store a newly created genre in the database
    public function store(Request $request): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new genre
        Genre::create($request->all());

        return redirect()->route('genres.index')->with('success', 'Genre created successfully.');
    }

    // Display the specified genre
    public function show(Genre $genre): View
    {
        return view('genres.show', compact('genre'));
    }

    // Show the form for editing the specified genre
    public function edit(Genre $genre): View
    {
        return view('genres.edit', compact('genre'));
    }

    // Update the specified genre in the database
    public function update(Request $request, Genre $genre): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Update the genre
        $genre->update($request->all());

        return redirect()->route('genres.index')->with('success', 'Genre updated successfully.');
    }

    // Remove the specified genre from the database
    public function destroy(Genre $genre): RedirectResponse
    {
        // Delete the genre
        $genre->delete();

        return redirect()->route('genres.index')->with('success', 'Genre deleted successfully.');
    }
}
