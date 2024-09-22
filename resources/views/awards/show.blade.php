@extends('layouts.master')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Award Details</h1>

    <div class="bg-white p-4 rounded shadow-md">
        <div class="mb-4">
            <strong class="text-gray-700">Name:</strong>
            <p>{{ $award->name }}</p>
        </div>
        <div class="mb-4">
            <strong class="text-gray-700">Category:</strong>
            <p>{{ $award->category }}</p>
        </div>
        <div class="mb-4">
            <strong class="text-gray-700">Year:</strong>
            <p>{{ $award->year }}</p>
        </div>
        <div class="mb-4">
            <strong class="text-gray-700">Description:</strong>
            <p>{{ $award->description }}</p>
        </div>

        <a href="{{ route('awards.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Back to Awards</a>
    </div>
</div>
@endsection
