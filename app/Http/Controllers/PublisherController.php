<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    // Display a listing of publishers
    public function index(Request $request)
    {
        $search = $request->input('search');
        $publishers = Publisher::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('headquarters', 'like', "%{$search}%");
        })
        ->orderBy('name', 'asc') // Order by name in ascending order
        ->paginate(10); // Adjust the number of items per page as needed
    
        return view('publishers.index', compact('publishers'));
    }    

    // Show the form for creating a new publisher
    public function create()
    {
        return view('publishers.create');
    }

    // Store a newly created publisher in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'founded_year' => 'nullable|string',
            'headquarters' => 'nullable|string',
            'website' => 'nullable|url',
        ]);

        Publisher::create($request->all());

        return redirect()->route('publishers.index')->with('success', 'Publisher created successfully.');
    }

    // Display the specified publisher
    public function show(Publisher $publisher)
    {
        return view('publishers.show', compact('publisher'));
    }

    // Show the form for editing the specified publisher
    public function edit(Publisher $publisher)
    {
        return view('publishers.edit', compact('publisher'));
    }

    // Update the specified publisher in storage
    public function update(Request $request, Publisher $publisher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'founded_year' => 'nullable|string',
            'headquarters' => 'nullable|string',
            'website' => 'nullable|url',
        ]);

        $publisher->update($request->all());

        return redirect()->route('publishers.index')->with('success', 'Publisher updated successfully.');
    }

    // Remove the specified publisher from storage
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
    
        // Redirect to /publishers after deletion
        return redirect('/publishers')->with('success', 'Publisher deleted successfully.');
    }
    
}
