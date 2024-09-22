<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PublisherController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        try {
            // Authorize viewAny action, based on the roles allowed to view publishers
            $this->authorize('viewAny', Publisher::class);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            // Redirect to a different page with an error message if unauthorized
            return redirect()->route('home')->with('error', 'You do not have permission to view this page.');
        }

        // Handle search and pagination logic
        $search = $request->input('search');
        $publishers = Publisher::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('publishers.index', ['publishers' => $publishers, 'search' => $search]);
    }

    public function create()
    {
        // Authorize the create action (Admin only)
        try {
            $this->authorize('create', Publisher::class);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('publishers.index')->with('error', 'You do not have permission to create a publisher.');
        }

        return view('publishers.create');
    }

    public function store(Request $request)
    {
        // Authorize the create action (Admin only)
        $this->authorize('create', Publisher::class);

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'founded_date' => 'nullable|date',
            'headquarters' => 'nullable|string|max:255',
            'website' => 'nullable|url',
            'description' => 'nullable|string',
        ]);

        // Create a new publisher
        Publisher::create($request->all());

        return redirect()->route('publishers.index')->with('success', 'Publisher created successfully.');
    }

    public function show($id)
    {
        // Authorize the action, depending on your authorization setup
        $publisher = Publisher::findOrFail($id);

        $this->authorize('view', $publisher); // Ensures only allowed roles can view

        return view('publishers.show', compact('publisher'));
    }

    public function edit(Publisher $publisher)
    {
        // Authorize the update action (Admin and Writer roles only)
        try {
            $this->authorize('update', $publisher);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('publishers.index')->with('error', 'You do not have permission to edit this publisher.');
        }

        return view('publishers.edit', compact('publisher'));
    }

    public function update(Request $request, Publisher $publisher)
    {
        // Authorize the update action (Admin and Writer roles only)
        $this->authorize('update', $publisher);

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'founded_date' => 'nullable|date',
            'headquarters' => 'nullable|string|max:255',
            'website' => 'nullable|url',
            'description' => 'nullable|string',
        ]);

        // Update the publisher
        $publisher->update($request->all());

        return redirect()->route('publishers.index')->with('success', 'Publisher updated successfully.');
    }

    public function destroy(Publisher $publisher)
    {
        // Authorize the delete action (Admin only)
        try {
            $this->authorize('delete', $publisher);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('publishers.index')->with('error', 'You do not have permission to delete this publisher.');
        }

        // Delete the publisher
        $publisher->delete();

        return redirect()->route('publishers.index')->with('success', 'Publisher deleted successfully.');
    }
}
