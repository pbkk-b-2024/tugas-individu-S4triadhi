@extends('layouts.master')

@section('title', 'Edit User')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Edit User</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block">Name:</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block">Email:</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block">Password (leave blank to keep current):</label>
            <input type="password" name="password" id="password" class="border p-2 w-full">
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="border p-2 w-full">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update User</button>
    </form>
@endsection
