@extends('layouts.master')

@section('title', 'ESRB Ratings List')

@section('content')
    <h2 class="text-2xl font-bold mb-4">ESRB Ratings</h2>
    <a href="{{ route('esrb_ratings.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create ESRB Rating</a>

    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded mt-2">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search Bar -->
    <form action="{{ route('esrb_ratings.index') }}" method="GET" class="mb-4 flex">
        <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="Search ESRB ratings..." class="border p-2 w-full rounded-l" />
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r">Search</button>
    </form>

    <table class="min-w-full bg-white mt-4">
        <thead>
            <tr>
                <th class="py-2 px-4 border">Rating</th>
                <th class="py-2 px-4 border">Description</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($esrb_ratings as $rating)
                <tr>
                    <td class="py-2 px-4 border">{{ $rating->rating }}</td>
                    <td class="py-2 px-4 border">{{ $rating->description }}</td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('esrb_ratings.show', $rating->id) }}" class="text-blue-500 mr-2">Show</a>
                        <a href="{{ route('esrb_ratings.edit', $rating->id) }}" class="text-yellow-500 mr-2">Edit</a>
                        <form action="{{ route('esrb_ratings.destroy', $rating->id) }}" method="POST" style="display:inline;">
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
            Showing {{ $esrb_ratings->firstItem() }} to {{ $esrb_ratings->lastItem() }} of {{ $esrb_ratings->total() }} results
        </div>
        <div class="flex space-x-1">
            @if ($esrb_ratings->onFirstPage())
                <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">« Previous</span>
            @else
                <a href="{{ $esrb_ratings->previousPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">« Previous</a>
            @endif

            @foreach ($esrb_ratings->links()->elements[0] as $page => $url)
                @if ($esrb_ratings->currentPage() == $page)
                    <span class="px-4 py-2 bg-blue-500 text-white rounded">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">{{ $page }}</a>
                @endif
            @endforeach

            @if ($esrb_ratings->hasMorePages())
                <a href="{{ $esrb_ratings->nextPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">Next »</a>
            @else
                <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">Next »</span>
            @endif
        </div>
    </div>
@endsection
