@extends('layouts.master')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">{{ $publisher->name }}</h1>

        <!-- Publisher Details -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <h2 class="text-xl font-semibold">Founded Date:</h2>
                <p>{{ $publisher->founded_date }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-xl font-semibold">Headquarters:</h2>
                <p>{{ $publisher->headquarters }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-xl font-semibold">Website:</h2>
                @if($publisher->website)
                    <a href="{{ $publisher->website }}" class="text-blue-500 hover:underline" target="_blank">{{ $publisher->website }}</a>
                @else
                    <p>N/A</p>
                @endif
            </div>
            <div class="mb-4">
                <h2 class="text-xl font-semibold">Description:</h2>
                <p>{{ $publisher->description }}</p>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-6">
            <a href="{{ route('publishers.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Back to Publishers List
            </a>
        </div>
    </div>
@endsection
