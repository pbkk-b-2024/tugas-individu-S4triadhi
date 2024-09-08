<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        // Apply search filter if provided
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
        $roles = Role::all();  // Fetch all roles for the dropdown
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Validate user input, including role selection
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|exists:roles,id', // Validate role
        ]);
    
        // Create the new user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);
    
        // Attach the selected role to the user
        $user->roles()->sync([$validated['role']]);
    
        // Redirect with success message
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }
    

    public function edit(User $user)
    {
        $roles = Role::all();  // Fetch all roles for the dropdown
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|exists:roles,id', // Validate role selection
        ]);

        $user->update($validated);

        // Sync the user's role
        $user->roles()->sync([$validated['role']]);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
