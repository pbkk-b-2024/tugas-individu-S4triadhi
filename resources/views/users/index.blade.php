@extends('layouts.master')

@section('content')
<div class="container mx-auto mt-4">
    <h2 class="text-2xl font-bold mb-4">User List</h2>

    <!-- Search Form -->
    <form action="{{ route('users.index') }}" method="GET" class="mb-4">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search users..." class="border px-4 py-2 rounded-lg w-full md:w-1/2 lg:w-1/3">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2 inline-block">Search</button>
    </form>

    <!-- Button to add new user -->
    <a href="{{ route('users.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New User</a>

    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden border border-gray-300">
        <thead>
            <tr class="bg-gray-200 text-gray-800 border-b border-gray-300">
                <th class="px-4 py-2 border-r border-gray-300">Name</th>
                <th class="px-4 py-2 border-r border-gray-300">Email</th>
                <th class="px-4 py-2 border-r border-gray-300">Role</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="px-4 py-2 border-b border-gray-300">{{ $user->name }}</td>
                    <td class="px-4 py-2 border-b border-gray-300">{{ $user->email }}</td>
                    <td class="px-4 py-2 border-b border-gray-300">
                        @foreach ($user->roles as $role)
                            {{ $role->name }}
                        @endforeach
                    </td>
                    <td class="px-4 py-2 border-b border-gray-300">
                        <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="mt-4 flex justify-between items-center">
        <div class="text-sm text-gray-700">
            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} results
        </div>
        <div class="flex space-x-1">
            @if ($users->onFirstPage())
                <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">« Previous</span>
            @else
                <a href="{{ $users->previousPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">« Previous</a>
            @endif
    
            @foreach ($users->links()->elements[0] as $page => $url)
                @if ($users->currentPage() == $page)
                    <span class="px-4 py-2 bg-blue-500 text-white rounded">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">{{ $page }}</a>
                @endif
            @endforeach
    
            @if ($users->hasMorePages())
                <a href="{{ $users->nextPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">Next »</a>
            @else
                <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">Next »</span>
            @endif
        </div>
    </div>
</div>
@endsection
