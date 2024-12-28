@extends('layouts.master')

@section('title', 'Publisher Details')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Publisher Details</h2>

    <div class="mb-4">
        <strong>Name:</strong> {{ $publisher->name }}
    </div>
    <div class="mb-4">
        <strong>Founded Year:</strong> {{ $publisher->founded_year }}
    </div>
    <div class="mb-4">
        <strong>Headquarters:</strong> {{ $publisher->headquarters }}
    </div>
    <div class="mb-4">
        <strong>Website:</strong> {{ $publisher->website }}
    </div>

    <!-- Back Button -->
    <a href="{{ route('publishers.index') }}" class="bg-red-500 text-white px-4 py-2 rounded inline-block">Back</a>
@endsection
