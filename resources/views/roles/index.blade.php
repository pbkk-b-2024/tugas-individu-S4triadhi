@extends('layouts.master')

@section('title', 'Roles List')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Roles</h2>
    <a href="{{ route('roles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Role</a>

    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded mt-2">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white mt-4">
        <thead>
            <tr>
                <th class="py-2 px-4 border">Name</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td class="py-2 px-4 border">{{ $role->name }}</td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('roles.show', $role->id) }}" class="text-blue-500 mr-2">Show</a>
                        <a href="{{ route('roles.edit', $role->id) }}" class="text-yellow-500 mr-2">Edit</a>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
