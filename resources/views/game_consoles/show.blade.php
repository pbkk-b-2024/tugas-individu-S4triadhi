@extends('layouts.master')

@section('title', 'Game Console Details')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Game Console Details</h2>

    <div class="mb-4">
        <strong>Name:</strong> {{ $gameConsole->name }}
    </div>
    <div class="mb-4">
        <strong>Manufacturer:</strong> {{ $gameConsole->manufacturer }}
    </div>
    <div class="mb-4">
        <strong>Release Date:</strong> {{ $gameConsole->release_date }}
    </div>
    <div class="mb-4">
        <strong>Generation:</strong> {{ $gameConsole->generation }}
    </div>

    <a href="{{ route('game_consoles.index') }}" class="bg-red-500 text-white px-4 py-2 rounded inline-block">Back</a>
@endsection
