<div class="bg-gray-700 text-white w-64 p-4 h-full">
    <ul>
        <li class="p-4"><a href="<?php echo e(route('home')); ?>">Dashboard</a></li>
        
        <?php if(auth()->user()->hasRole('Admin')): ?> 
            <li class="p-4"><a href="<?php echo e(route('users.index')); ?>">Users</a></li>
            <li class="p-4"><a href="<?php echo e(route('roles.index')); ?>">Roles</a></li>
        <?php endif; ?>
        
        <li class="p-4"><a href="<?php echo e(route('games.index')); ?>">Games</a></li>
        <li class="p-4"><a href="<?php echo e(route('developers.index')); ?>">Developers</a></li>
        <li class="p-4"><a href="<?php echo e(route('publishers.index')); ?>">Publishers</a></li>
        <li class="p-4"><a href="<?php echo e(route('categories.index')); ?>">Categories</a></li>
        <li class="p-4"><a href="<?php echo e(route('game_consoles.index')); ?>">Game Consoles</a></li>
        <li class="p-4"><a href="<?php echo e(route('awards.index')); ?>">Awards</a></li>
    </ul>
</div>
<?php /**PATH D:\ITS\Matkul\Semester 5\PBKK\Tugas 2\tugas2\resources\views/components/sidebar.blade.php ENDPATH**/ ?>