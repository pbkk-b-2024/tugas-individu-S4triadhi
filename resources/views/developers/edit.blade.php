<!-- resources/views/developers/edit.blade.php -->

@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold">Edit Developer</h1>

    <form action="{{ route('developers.update', $developer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block">Name</label>
            <input type="text" id="name" name="name" class="form-input mt-1 block w-full" value="{{ old('name', $developer->name) }}" required>
        </div>
        <div class="mb-4">
            <label for="founded_date" class="block">Founded Date</label>
            <input type="date" id="founded_date" name="founded_date" class="form-input mt-1 block w-full" value="{{ old('founded_date', $developer->founded_date) }}">
        </div>
        <div class="mb-4">
            <label for="headquarters" class="block">Headquarters</label>
            <input type="text" id="headquarters" name="headquarters" class="form-input mt-1 block w-full" value="{{ old('headquarters', $developer->headquarters) }}">
        </div>
        <div class="mb-4">
            <label for="website" class="block">Website</label>
            <input type="url" id="website" name="website" class="form-input mt-1 block w-full" value="{{ old('website', $developer->website) }}">
        </div>
        <div class="mb-4">
            <label for="description" class="block">Description</label>
            <textarea id="description" name="description" class="form-textarea mt-1 block w-full">{{ old('description', $developer->description) }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
