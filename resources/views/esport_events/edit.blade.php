@extends('layouts.master')

@section('title', 'Edit Esport Event')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Edit Esport Event: {{ $esport_event->name }}</h2>

    <a href="{{ route('esport_events.index') }}" class="bg-red-500 text-white px-4 py-2 rounded mb-4 inline-block">Back</a>

    <form action="{{ route('esport_events.update', $esport_event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block">Event Name:</label>
            <input type="text" name="name" id="name" class="border p-2 w-full" value="{{ $esport_event->name }}" required>
        </div>

        <div class="mb-4">
            <label for="event_date" class="block">Event Date:</label>
            <input type="date" name="event_date" id="event_date" class="border p-2 w-full" value="{{ $esport_event->event_date }}" required>
        </div>

        <div class="mb-4">
            <label for="location" class="block">Location:</label>
            <input type="text" name="location" id="location" class="border p-2 w-full" value="{{ $esport_event->location }}">
        </div>

        <div class="mb-4">
            <label for="prize_pool" class="block">Prize Pool:</label>
            <input type="text" name="prize_pool" id="prize_pool" class="border p-2 w-full" value="{{ $esport_event->prize_pool }}">
        </div>

        <div class="mb-4">
            <label for="description" class="block">Description:</label>
            <textarea name="description" id="description" class="border p-2 w-full">{{ $esport_event->description }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Esport Event</button>
    </form>
@endsection
