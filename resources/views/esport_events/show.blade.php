@extends('layouts.master')

@section('title', 'Esport Event Details')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Esport Event: {{ $esport_event->name }}</h2>

    <a href="{{ route('esport_events.index') }}" class="bg-red-500 text-white px-4 py-2 rounded mb-4 inline-block">Back</a>

    <div class="mb-4">
        <strong>Date:</strong> {{ $esport_event->event_date }}
    </div>
    <div class="mb-4">
        <strong>Location:</strong> {{ $esport_event->location }}
    </div>
    <div class="mb-4">
        <strong>Prize Pool:</strong> {{ $esport_event->prize_pool }}
    </div>
    <div class="mb-4">
        <strong>Description:</strong>
        <p>{{ $esport_event->description }}</p>
    </div>
@endsection
