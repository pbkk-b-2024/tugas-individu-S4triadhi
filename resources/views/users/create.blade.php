@extends('layouts.master')

@section('title', 'Create User')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Create User</h2>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block">Name:</label>
            <input type="text" name="name" id="name" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block">Email:</label>
            <input type="email" name="email" id="email" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block">Password:</label>
            <input type="password" name="password" id="password" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="border p-2 w-full" required>
        </div>
        
        <div class="flex space-x-2 mt-4"> <!-- Flex container for buttons -->
            <a href="{{ route('users.index') }}" class="bg-red-500 text-white px-4 py-2 rounded">Back</a> <!-- Back button -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create User</button> <!-- Create User button -->
        </div>
    </form>
@endsection
