<!-- resources/views/developers/create.blade.php -->

@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold">Add Developer</h1>

    <form action="{{ route('developers.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block">Name</label>
            <input type="text" id="name" name="name" class="form-input mt-1 block w-full" value="{{ old('name') }}" required>
        </div>
        <div class="mb-4">
            <label for="founded_date" class="block">Founded Date</label>
            <input type="date" id="founded_date" name="founded_date" class="form-input mt-1 block w-full" value="{{ old('founded_date') }}">
        </div>
        <div class="mb-4">
            <label for="headquarters" class="block">Headquarters</label>
            <input type="text" id="headquarters" name="headquarters" class="form-input mt-1 block w-full" value="{{ old('headquarters') }}">
        </div>
        <div class="mb-4">
            <label for="website" class="block">Website</label>
            <input type="url" id="website" name="website" class="form-input mt-1 block w-full" value="{{ old('website') }}">
        </div>
        <div class="mb-4">
            <label for="description" class="block">Description</label>
            <textarea id="description" name="description" class="form-textarea mt-1 block w-full">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
