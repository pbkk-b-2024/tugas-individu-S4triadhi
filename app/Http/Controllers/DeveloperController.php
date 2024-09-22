<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DeveloperController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        try {
            // Authorize viewAny action, based on the roles allowed to view developers
            $this->authorize('viewAny', Developer::class);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            // Redirect to a different page with an error message if unauthorized
            return redirect()->route('home')->with('error', 'You do not have permission to view this page.');
        }

        // Handle search and pagination logic
        $search = $request->input('search');
        $developers = Developer::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('developers.index', ['developers' => $developers, 'search' => $search]);
    }

    public function create()
    {
        // Authorize the create action (Admin only)
        try {
            $this->authorize('create', Developer::class);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('developers.index')->with('error', 'You do not have permission to create a developer.');
        }

        return view('developers.create');
    }

    public function store(Request $request)
    {
        // Authorize the create action (Admin only)
        $this->authorize('create', Developer::class);

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'founded_date' => 'nullable|date',
            'headquarters' => 'nullable|string|max:255',
            'website' => 'nullable|url',
            'description' => 'nullable|string',
        ]);

        // Create a new developer
        Developer::create($request->all());

        return redirect()->route('developers.index')->with('success', 'Developer created successfully.');
    }

    public function show($id)
    {
        // Authorize the action, depending on your authorization setup
        $developer = Developer::findOrFail($id);

        $this->authorize('view', $developer); // Ensures only allowed roles can view

        return view('developers.show', compact('developer'));
    }

    public function edit(Developer $developer)
    {
        // Authorize the update action (Admin and Writer roles only)
        try {
            $this->authorize('update', $developer);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('developers.index')->with('error', 'You do not have permission to edit this developer.');
        }

        return view('developers.edit', compact('developer'));
    }

    public function update(Request $request, Developer $developer)
    {
        // Authorize the update action (Admin and Writer roles only)
        $this->authorize('update', $developer);

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'founded_date' => 'nullable|date',
            'headquarters' => 'nullable|string|max:255',
            'website' => 'nullable|url',
            'description' => 'nullable|string',
        ]);

        // Update the developer
        $developer->update($request->all());

        return redirect()->route('developers.index')->with('success', 'Developer updated successfully.');
    }

    public function destroy(Developer $developer)
    {
        // Authorize the delete action (Admin only)
        try {
            $this->authorize('delete', $developer);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('developers.index')->with('error', 'You do not have permission to delete this developer.');
        }

        // Delete the developer
        $developer->delete();

        return redirect()->route('developers.index')->with('success', 'Developer deleted successfully.');
    }
}
