@extends('layouts.master')

@section('title', 'User List')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Users</h2>
    <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create User</a>

    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded mt-2">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search Bar -->
    <form action="{{ route('users.index') }}" method="GET" class="mb-4">
        <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="Search users..." class="border p-2 w-full" />
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Search</button>
    </form>

    <table class="min-w-full bg-white mt-4">
        <thead>
            <tr>
                <th class="py-2 px-4 border">Name</th>
                <th class="py-2 px-4 border">Email</th>
                <th class="py-2 px-4 border">Role</th> <!-- New Role Column -->
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="py-2 px-4 border">{{ $user->name }}</td>
                    <td class="py-2 px-4 border">{{ $user->email }}</td>
                    <td class="py-2 px-4 border">{{ optional($user->role)->name ?? 'N/A' }}</td> <!-- User Role -->
                    <td class="py-2 px-4 border">
                        <a href="{{ route('users.show', $user->id) }}" class="text-blue-500 mr-2">Show</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="text-yellow-500 mr-2">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
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
@endsection
