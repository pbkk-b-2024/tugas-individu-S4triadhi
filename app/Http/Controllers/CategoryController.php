<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        try {
            // Authorize viewAny action, based on the roles allowed to view categories
            $this->authorize('viewAny', Category::class);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            // Redirect to a different page with an error message if unauthorized
            return redirect()->route('home')->with('error', 'You do not have permission to view this page.');
        }

        // Handle search and pagination logic
        $search = $request->input('search');
        $categories = Category::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('categories.index', ['categories' => $categories, 'search' => $search]);
    }

    public function create()
    {
        // Authorize the create action (Admin only)
        try {
            $this->authorize('create', Category::class);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('categories.index')->with('error', 'You do not have permission to create a category.');
        }

        return view('categories.create');
    }

    public function store(Request $request)
    {
        // Authorize the create action (Admin only)
        $this->authorize('create', Category::class);

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new category
        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        // Authorize the action, depending on your authorization setup
        $this->authorize('view', $category); // Ensures only allowed roles can view

        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        // Authorize the update action (Admin and Writer roles only)
        try {
            $this->authorize('update', $category);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('categories.index')->with('error', 'You do not have permission to edit this category.');
        }

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        // Authorize the update action (Admin and Writer roles only)
        $this->authorize('update', $category);

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Update the category
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        // Authorize the delete action (Admin only)
        try {
            $this->authorize('delete', $category);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('categories.index')->with('error', 'You do not have permission to delete this category.');
        }

        // Delete the category
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
