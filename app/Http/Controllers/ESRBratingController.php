<?php

namespace App\Http\Controllers;

use App\Models\EsrbRating; 
use Illuminate\Http\Request;

class EsrbRatingController extends Controller
{
    // Display a listing of ESRB ratings
    public function index(Request $request)
    {
        $search = $request->input('search');
        // Fetch ESRB ratings and apply search if provided
        $esrb_ratings = EsrbRating::when($search, function ($query, $search) {
            return $query->where('rating', 'like', "%{$search}%")
                         ->orWhere('description', 'like', "%{$search}%");
        })->paginate(10); // Adjust the number of items per page as needed

        return view('esrb_ratings.index', compact('esrb_ratings'));
    }

    // Show the form for creating a new ESRB rating
    public function create()
    {
        return view('esrb_ratings.create');
    }

    // Store a newly created ESRB rating in storage
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|string|max:255', 
            'description' => 'nullable|string',
        ]);

        EsrbRating::create($request->all());

        return redirect()->route('esrb_ratings.index')->with('success', 'ESRB Rating created successfully.');
    }

    // Display the specified ESRB rating
    public function show(EsrbRating $esrb_rating)
    {
        return view('esrb_ratings.show', compact('esrb_rating'));
    }

    // Show the form for editing the specified ESRB rating
    public function edit(EsrbRating $esrb_rating) 
    {
        return view('esrb_ratings.edit', compact('esrb_rating'));
    }

    // Update the specified ESRB rating in storage
    public function update(Request $request, EsrbRating $esrb_rating)
    {
        $request->validate([
            'rating' => 'required|string|max:255', 
            'description' => 'nullable|string',
        ]);

        $esrb_rating->update($request->all());

        return redirect()->route('esrb_ratings.index')->with('success', 'ESRB Rating updated successfully.');
    }

    // Remove the specified ESRB rating from storage
    public function destroy(EsrbRating $esrb_rating) 
    {
        $esrb_rating->delete();

        // Redirect to /esrb_ratings after deletion
        return redirect()->route('esrb_ratings.index')->with('success', 'ESRB Rating deleted successfully.'); // Changed redirect to use named route
    }
}
