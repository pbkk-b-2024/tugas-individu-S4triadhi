<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{

    use AuthorizesRequests; 

    public function index(Request $request)
    {
        
        try {
            // Authorize viewAny action, only Admins can access this
            $this->authorize('viewAny', User::class);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            // Redirect to a different page (e.g., dashboard) with a message
            return redirect()->route('home')->with('error', 'You do not have permission to view this page.');
        }

        $search = $request->input('search');
        $users = User::with('roles')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                             ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        $this->authorize('create', User::class);

        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|exists:roles,id',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        $user->roles()->sync([$validated['role']]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|exists:roles,id',
        ]);

        $user->update($validated);
        $user->roles()->sync([$validated['role']]);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
