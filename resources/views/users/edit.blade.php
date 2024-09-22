@extends('layouts.master')

@section('content')
<div class="container mx-auto mt-4">
    <h2 class="text-2xl font-bold">{{ isset($user) ? 'Edit User' : 'Create New User' }}</h2>

    <form method="POST" action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}">
        @csrf
        @if (isset($user))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" value="{{ old('name', isset($user) ? $user->name : '') }}" class="w-full px-4 py-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', isset($user) ? $user->email : '') }}" class="w-full px-4 py-2 border rounded">
        </div>

        <!-- Role selection -->
        <div class="mb-4">
            <label for="role" class="block text-gray-700">Role</label>
            <select name="role" class="w-full px-4 py-2 border rounded">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ isset($user) && $user->roles->contains($role->id) ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            {{ isset($user) ? 'Update User' : 'Create User' }}
        </button>
    </form>
</div>
@endsection
