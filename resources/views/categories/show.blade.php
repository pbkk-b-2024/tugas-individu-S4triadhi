@extends('layouts.master')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">{{ $category->name }}</h1>

    <div class="mb-4">
        <strong>Description:</strong>
        <p>{{ $category->description }}</p>
    </div>

    <a href="{{ route('categories.edit', $category->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md">Edit</a>

    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
</div>
@endsection
