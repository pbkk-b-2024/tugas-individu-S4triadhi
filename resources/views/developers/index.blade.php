@extends('layouts.master')

@section('title', 'Developer List')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Developers</h2>
    <a href="{{ route('developers.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create Developer</a>

    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded mt-2">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search Bar -->
    <form action="{{ route('developers.index') }}" method="GET" class="mb-4 flex">
        <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="Search developers..." class="border p-2 w-full rounded-l" />
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r">Search</button>
    </form>

    <table class="min-w-full bg-white mt-4">
        <thead>
            <tr>
                <th class="py-2 px-4 border">Name</th>
                <th class="py-2 px-4 border">Founded Year</th>
                <th class="py-2 px-4 border">Headquarters</th>
                <th class="py-2 px-4 border">Website</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($developers as $developer)
                <tr>
                    <td class="py-2 px-4 border">{{ $developer->name }}</td>
                    <td class="py-2 px-4 border">{{ $developer->founded_year }}</td>
                    <td class="py-2 px-4 border">{{ $developer->headquarters }}</td>
                    <td class="py-2 px-4 border">{{ $developer->website }}</td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('developers.show', $developer->id) }}" class="text-blue-500 mr-2">Show</a>
                        <a href="{{ route('developers.edit', $developer->id) }}" class="text-yellow-500 mr-2">Edit</a>
                        <form action="{{ route('developers.destroy', $developer->id) }}" method="POST" style="display:inline;">
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
            Showing {{ $developers->firstItem() }} to {{ $developers->lastItem() }} of {{ $developers->total() }} results
        </div>
        <div class="flex space-x-1">
            @if ($developers->onFirstPage())
                <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">« Previous</span>
            @else
                <a href="{{ $developers->previousPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">« Previous</a>
            @endif

            @foreach ($developers->links()->elements[0] as $page => $url)
                @if ($developers->currentPage() == $page)
                    <span class="px-4 py-2 bg-blue-500 text-white rounded">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">{{ $page }}</a>
                @endif
            @endforeach

            @if ($developers->hasMorePages())
                <a href="{{ $developers->nextPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">Next »</a>
            @else
                <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">Next »</span>
            @endif
        </div>
    </div>
@endsection
