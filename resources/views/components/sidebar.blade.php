<div class="bg-gray-700 text-white w-64 p-4 h-full">
    <ul>
        <li class="p-4"><a href="{{ route('home') }}">Dashboard</a></li>
        
        @if (auth()->user()->hasRole('Admin')) {{-- Check if the logged-in user has the Admin role --}}
            <li class="p-4"><a href="{{ route('users.index') }}">Users</a></li>
            <li class="p-4"><a href="{{ route('roles.index') }}">Roles</a></li>
        @endif
        
        <li class="p-4"><a href="{{ route('games.index') }}">Games</a></li>
        <li class="p-4"><a href="{{ route('developers.index') }}">Developers</a></li>
        <li class="p-4"><a href="{{ route('publishers.index') }}">Publishers</a></li>
        <li class="p-4"><a href="{{ route('categories.index') }}">Categories</a></li>
        <li class="p-4"><a href="{{ route('game_consoles.index') }}">Game Consoles</a></li>
        <li class="p-4"><a href="{{ route('awards.index') }}">Awards</a></li>
    </ul>
</div>
