<header class="bg-blue-500 text-white p-4 relative">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-xl font-bold">Games Archive</h1>

        <div class="relative">
            <!-- Profile button displaying the user's profile picture -->
            <button id="profile-button" class="focus:outline-none">
                <img src="{{ auth()->user()->profile_picture ?? 'path/to/default-profile-pic.png' }}" alt="Profile" class="w-12 h-12 rounded-full"> <!-- Increased size -->
            </button>

            <!-- Dropdown menu -->
            <div id="dropdown-menu" class="absolute right-0 hidden bg-white text-black rounded shadow-lg mt-2 w-48">
                <a href="/profile" class="block px-4 py-2 hover:bg-blue-500 hover:text-white">Edit Profile</a>
                <form action="/logout" method="POST" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 hover:bg-blue-500 hover:text-white">Logout</button>
                </form>
            </div>
        </div>
    </div>
</header>

<!-- Include Alpine.js for interactivity -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const profileButton = document.getElementById('profile-button');
        const dropdownMenu = document.getElementById('dropdown-menu');

        profileButton.addEventListener('click', function () {
            dropdownMenu.classList.toggle('hidden');
        });

        // Close the dropdown if clicked outside
        window.addEventListener('click', function (event) {
            if (!profileButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>
