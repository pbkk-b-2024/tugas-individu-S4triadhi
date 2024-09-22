<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RoleController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        try {
            // Authorize viewAny action, only Admins can access this
            $this->authorize('viewAny', Role::class);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            // Redirect to a different page (e.g., dashboard) with a message
            return redirect()->route('home')->with('error', 'You do not have permission to view this page.');
        }

        $search = $request->input('search');
        $roles = Role::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->withCount('users') // Add user count
            ->paginate(10); // Paginate results with 10 roles per page

        return view('roles.index', ['roles' => $roles, 'search' => $search]);
    }

    public function create()
    {
        $this->authorize('create', Role::class);
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Role::class);

        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Role::create($request->all());

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        $this->authorize('update', $role);
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $this->authorize('update', $role);

        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);

        $role->update($request->all());

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
