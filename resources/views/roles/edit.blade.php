@extends('layouts.master')

@section('title', 'Edit Role')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Edit Role</h2>

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block">Role Name:</label>
            <input type="text" name="name" id="name" value="{{ $role->name }}" class="border p-2 w-full" required>
        </div>

        <div class="flex items-center"> <!-- Align items horizontally -->
            <a href="{{ route('roles.index') }}" class="bg-red-500 text-white px-4 py-2 rounded mr-4">Back</a> <!-- Add margin-right -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Role</button>
        </div>
    </form>
@endsection
