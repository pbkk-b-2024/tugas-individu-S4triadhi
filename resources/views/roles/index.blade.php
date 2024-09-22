@extends('layouts.master')

@section('content')
<div class="container mx-auto mt-4">
    <h2 class="text-2xl font-bold mb-4">Roles</h2>

    @if (auth()->user()->hasRole('Admin')) {{-- Check if the logged-in user has the Admin role --}}
        <!-- Search Form -->
        <form action="{{ route('roles.index') }}" method="GET" class="mb-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by role name..." class="border px-4 py-2 rounded-lg w-full md:w-1/2 lg:w-1/3">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2 inline-block">Search</button>
        </form>

        <!-- Button to add new role -->
        <a href="{{ route('roles.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Role</a>

        <!-- Roles Table -->
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-800 border-b border-gray-300">
                    <th class="px-4 py-2 border-r border-gray-300">Role Name</th>
                    <th class="px-4 py-2 border-r border-gray-300">Quantity</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($roles as $role)
                    <tr>
                        <td class="px-4 py-2 border-b border-gray-300">{{ $role->name }}</td>
                        <td class="px-4 py-2 border-b border-gray-300">{{ $role->users_count }}</td>
                        <td class="px-4 py-2 border-b border-gray-300">
                            <a href="{{ route('roles.edit', $role->id) }}" class="bg-yellow-500 text-white px-2 py-1">Edit</a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-2 py-1" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">No roles found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4 flex justify-between items-center">
            <div class="text-sm text-gray-700">
                Showing {{ $roles->firstItem() }} to {{ $roles->lastItem() }} of {{ $roles->total() }} results
            </div>
            <div class="flex space-x-1">
                @if ($roles->onFirstPage())
                    <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">« Previous</span>
                @else
                    <a href="{{ $roles->previousPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">« Previous</a>
                @endif
        
                @foreach ($roles->links()->elements[0] as $page => $url)
                    @if ($roles->currentPage() == $page)
                        <span class="px-4 py-2 bg-blue-500 text-white rounded">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">{{ $page }}</a>
                    @endif
                @endforeach
        
                @if ($roles->hasMorePages())
                    <a href="{{ $roles->nextPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">Next »</a>
                @else
                    <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">Next »</span>
                @endif
            </div>
        </div>
    @else
        <p class="text-red-500">You do not have permission to view this page.</p>
    @endif
</div>
@endsection
