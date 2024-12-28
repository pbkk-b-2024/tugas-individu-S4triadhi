@extends('layouts.master')

@section('title', 'Publisher List')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Publishers</h2>
    <a href="{{ route('publishers.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create Publisher</a>

    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded mt-2">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search Bar -->
    <form action="{{ route('publishers.index') }}" method="GET" class="mb-4 flex">
        <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="Search publishers..." class="border p-2 w-full rounded-l" />
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
            @foreach ($publishers as $publisher)
                <tr>
                    <td class="py-2 px-4 border">{{ $publisher->name }}</td>
                    <td class="py-2 px-4 border">{{ $publisher->founded_year }}</td>
                    <td class="py-2 px-4 border">{{ $publisher->headquarters }}</td>
                    <td class="py-2 px-4 border">{{ $publisher->website }}</td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('publishers.show', $publisher->id) }}" class="text-blue-500 mr-2">Show</a>
                        <a href="{{ route('publishers.edit', $publisher->id) }}" class="text-yellow-500 mr-2">Edit</a>
                        <form action="{{ route('publishers.destroy', $publisher->id) }}" method="POST" style="display:inline;">
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
            Showing {{ $publishers->firstItem() }} to {{ $publishers->lastItem() }} of {{ $publishers->total() }} results
        </div>
        <div class="flex space-x-1">
            @if ($publishers->onFirstPage())
                <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">« Previous</span>
            @else
                <a href="{{ $publishers->previousPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">« Previous</a>
            @endif

            @foreach ($publishers->links()->elements[0] as $page => $url)
                @if ($publishers->currentPage() == $page)
                    <span class="px-4 py-2 bg-blue-500 text-white rounded">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">{{ $page }}</a>
                @endif
            @endforeach

            @if ($publishers->hasMorePages())
                <a href="{{ $publishers->nextPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">Next »</a>
            @else
                <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">Next »</span>
            @endif
        </div>
    </div>
@endsection
