<!-- Header Component -->
<div class="bg-gray-800 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-xl font-bold">My Information System</h1>

        <div class="relative">
            <button id="profile-button" class="flex items-center space-x-2 hover:text-gray-300">
                <span>Welcome, <?php echo e(Auth::user()->name); ?>!</span>
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div id="dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded-lg shadow-lg hidden">
                <ul class="py-2">
                    <li>
                        <a href="<?php echo e(route('profile.edit')); ?>" class="block px-4 py-2 hover:bg-gray-100">Edit Profile</a>
                    </li>
                    <li>
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Add this script to handle dropdown visibility -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const profileButton = document.getElementById('profile-button');
        const dropdownMenu = document.getElementById('dropdown-menu');

        profileButton.addEventListener('click', function () {
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown if clicked outside
        document.addEventListener('click', function (event) {
            if (!profileButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>
<?php /**PATH D:\ITS\Matkul\Semester 5\PBKK\Tugas 2\tugas2\resources\views/components/header.blade.php ENDPATH**/ ?>