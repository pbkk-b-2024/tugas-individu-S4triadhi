<?php

namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AwardsController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        try {
            // Authorize viewAny action, based on the roles allowed to view awards
            $this->authorize('viewAny', Award::class);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            // Redirect to a different page with an error message if unauthorized
            return redirect()->route('home')->with('error', 'You do not have permission to view this page.');
        }

        // Handle search and pagination logic
        $search = $request->input('search');
        $awards = Award::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('awards.index', ['awards' => $awards, 'search' => $search]);
    }

    public function create()
    {
        // Authorize the create action
        try {
            $this->authorize('create', Award::class);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('awards.index')->with('error', 'You do not have permission to create an award.');
        }

        return view('awards.create');
    }

    public function store(Request $request)
    {
        // Authorize the create action
        $this->authorize('create', Award::class);

        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'year' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        // Create a new award
        Award::create($validated);

        return redirect()->route('awards.index')->with('success', 'Award created successfully.');
    }

    public function show($id)
    {
        // Authorize the action
        $award = Award::findOrFail($id);
        $this->authorize('view', $award); // Ensures only allowed roles can view

        return view('awards.show', compact('award'));
    }

    public function edit($id)
    {
        // Authorize the update action
        $award = Award::findOrFail($id);
        try {
            $this->authorize('update', $award);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('awards.index')->with('error', 'You do not have permission to edit this award.');
        }

        return view('awards.edit', compact('award'));
    }

    public function update(Request $request, $id)
    {
        // Authorize the update action
        $award = Award::findOrFail($id);
        $this->authorize('update', $award);

        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'year' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        // Update the award
        $award->update($validated);

        return redirect()->route('awards.index')->with('success', 'Award updated successfully.');
    }

    public function destroy($id)
    {
        // Authorize the delete action
        $award = Award::findOrFail($id);
        try {
            $this->authorize('delete', $award);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('awards.index')->with('error', 'You do not have permission to delete this award.');
        }

        // Delete the award
        $award->delete();

        return redirect()->route('awards.index')->with('success', 'Award deleted successfully.');
    }
}
