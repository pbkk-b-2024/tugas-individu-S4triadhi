

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Games</h1>

    <!-- Button to Create New Game -->
    <div class="mb-4">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Game::class)): ?>
            <a href="<?php echo e(route('games.create')); ?>" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Add New Game
            </a>
        <?php endif; ?>
    </div>

    <!-- Search Form -->
    <form action="<?php echo e(route('games.index')); ?>" method="GET" class="mb-4">
        <input 
            type="text" 
            name="search" 
            value="<?php echo e(request('search')); ?>" 
            placeholder="Search games by title"
            class="border rounded px-4 py-2"
        >
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
    </form>

    <!-- Games Table -->
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 bg-gray-200">Title</th>
                <th class="py-2 px-4 bg-gray-200">Console</th>
                <th class="py-2 px-4 bg-gray-200">Release Date</th>
                <th class="py-2 px-4 bg-gray-200">Description</th>
                <th class="py-2 px-4 bg-gray-200">Rating</th>
                <th class="py-2 px-4 bg-gray-200">Developer</th>
                <th class="py-2 px-4 bg-gray-200">Publisher</th>
                <th class="py-2 px-4 bg-gray-200">Categories</th>
                <th class="py-2 px-4 bg-gray-200">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo e($game->title); ?></td>
                    <td class="border px-4 py-2">
                        <?php $__empty_2 = true; $__currentLoopData = $game->gameConsole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $console): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                            <span class="block"><?php echo e($console->name); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                            <span class="block">No consoles</span>
                        <?php endif; ?>
                    </td>                    
                    <td class="border px-4 py-2"><?php echo e($game->release_date ? $game->release_date->format('Y-m-d') : 'N/A'); ?></td>
                    <td class="border px-4 py-2"><?php echo e(Str::limit($game->description, 50)); ?></td>
                    <td class="border px-4 py-2"><?php echo e($game->rating); ?></td>
                    <td class="border px-4 py-2"><?php echo e($game->developer->name ?? 'Unknown Developer'); ?></td>
                    <td class="border px-4 py-2"><?php echo e($game->publisher->name ?? 'Unknown Publisher'); ?></td>
                    <td class="border px-4 py-2">
                        <?php $__currentLoopData = $game->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="block"><?php echo e($category->name); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td class="border px-4 py-2 flex space-x-2">
                        <a href="<?php echo e(route('games.show', $game->id)); ?>" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">View</a>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $game)): ?>
                            <a href="<?php echo e(route('games.edit', $game->id)); ?>" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $game)): ?>
                            <form action="<?php echo e(route('games.destroy', $game->id)); ?>" method="POST" class="inline-block">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="9" class="text-center py-4">No games found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Pagination Links -->
    <?php if($games->hasPages()): ?>
    <div class="mt-4 flex justify-between items-center">
        <div class="text-sm text-gray-700">
            Showing <?php echo e($games->firstItem()); ?> to <?php echo e($games->lastItem()); ?> of <?php echo e($games->total()); ?> results
        </div>
        <div>
            <?php echo e($games->links()); ?>

        </div>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ITS\Matkul\Semester 5\PBKK\Tugas 2\tugas2\resources\views/games/index.blade.php ENDPATH**/ ?>