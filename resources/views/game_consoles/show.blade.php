@extends('layouts.master')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Game Console Details</h1>

    <div class="mb-4">
        <strong>Name:</strong> {{ $gameConsole->name }}
    </div>
    <div class="mb-4">
        <strong>Manufacturer:</strong> {{ $gameConsole->manufacturer }}
    </div>
    <div class="mb-4">
        <strong>Release Year:</strong> {{ $gameConsole->release_year }}
    </div>
    <div class="mb-4">
        <strong>Generation:</strong> {{ $gameConsole->generation }}
    </div>
    <div class="mb-4">
        <strong>Discontinued Date:</strong>
        @if($gameConsole->discontinued_date)
            {{ $gameConsole->discontinued_date->toDateString() }}
        @else
            N/A
        @endif
    </div>
    <div class="mb-4">
        <strong>Description:</strong> {{ $gameConsole->description }}
    </div>

    <div class="mb-4">
        <a href="{{ route('game_consoles.edit', $gameConsole->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
        <a href="{{ route('game_consoles.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back to List</a>
    </div>
</div>
@endsection
