@extends('layouts.master')

@section('title', 'Create Role')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Create Role</h2>

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block">Role Name:</label>
            <input type="text" name="name" id="name" class="border p-2 w-full" required>
        </div>

        <div class="flex items-center"> <!-- Align items horizontally -->
            <a href="{{ route('roles.index') }}" class="bg-red-500 text-white px-4 py-2 rounded mr-4">Back</a> <!-- Add margin-right -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Role</button>
        </div>
    </form>
@endsection
