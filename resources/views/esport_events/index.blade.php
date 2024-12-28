@extends('layouts.master')

@section('title', 'Esport Events')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Esport Events</h2>

    <a href="{{ route('esport_events.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Event</a>

    @if($esport_events->count())
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 border-b">Event Name</th>
                    <th class="py-2 border-b">Event Date</th>
                    <th class="py-2 border-b">Location</th>
                    <th class="py-2 border-b">Prize Pool</th>
                    <th class="py-2 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($esport_events as $event)
                    <tr>
                        <td class="border-b px-4 py-2">{{ $event->name }}</td>
                        <td class="border-b px-4 py-2">{{ $event->event_date }}</td>
                        <td class="border-b px-4 py-2">{{ $event->location }}</td>
                        <td class="border-b px-4 py-2">{{ $event->prize_pool }}</td>
                        <td class="border-b px-4 py-2">
                            <a href="{{ route('esport_events.edit', $event) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('esport_events.destroy', $event) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4 flex justify-between items-center">
            <div class="text-sm text-gray-700">
                Showing {{ $esport_events->firstItem() }} to {{ $esport_events->lastItem() }} of {{ $esport_events->total() }} results
            </div>
            <div class="flex space-x-1">
                @if ($esport_events->onFirstPage())
                    <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">« Previous</span>
                @else
                    <a href="{{ $esport_events->previousPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">« Previous</a>
                @endif

                @foreach ($esport_events->links()->elements[0] as $page => $url)
                    @if ($esport_events->currentPage() == $page)
                        <span class="px-4 py-2 bg-blue-500 text-white rounded">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($esport_events->hasMorePages())
                    <a href="{{ $esport_events->nextPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">Next »</a>
                @else
                    <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">Next »</span>
                @endif
            </div>
        </div>
    @else
        <p class="text-gray-500">No esport events found.</p>
    @endif
@endsection
