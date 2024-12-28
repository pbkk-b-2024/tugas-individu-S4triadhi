@extends('layouts.master')

@section('title', 'Developer Details')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Developer Details</h2>

    <div class="mb-4">
        <strong>Name:</strong> {{ $developer->name }}
    </div>
    <div class="mb-4">
        <strong>Founded Year:</strong> {{ $developer->founded_year }}
    </div>
    <div class="mb-4">
        <strong>Headquarters:</strong> {{ $developer->headquarters }}
    </div>
    <div class="mb-4">
        <strong>Website:</strong> {{ $developer->website }}
    </div>

    <!-- Back Button -->
    <a href="{{ route('developers.index') }}" class="bg-red-500 text-white px-4 py-2 rounded inline-block">Back</a>
@endsection
