

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Game Consoles</h1>

    <!-- Button to Create New Game Console -->
    <div class="mb-4">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\GameConsole::class)): ?>
            <a href="<?php echo e(route('game_consoles.create')); ?>" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Add New Console
            </a>
        <?php endif; ?>
    </div>

    <!-- Search Form -->
    <form action="<?php echo e(route('game_consoles.index')); ?>" method="GET" class="mb-4">
        <input 
            type="text" 
            name="search" 
            value="<?php echo e(request('search')); ?>" 
            placeholder="Search by name or manufacturer"
            class="border rounded px-4 py-2"
        >
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
    </form>

    <!-- Game Consoles Table -->
    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="py-2 px-4 bg-gray-200">Name</th>
                <th class="py-2 px-4 bg-gray-200">Manufacturer</th>
                <th class="py-2 px-4 bg-gray-200">Release Year</th>
                <th class="py-2 px-4 bg-gray-200">Generation</th>
                <th class="py-2 px-4 bg-gray-200">Discontinued Date</th>
                <th class="py-2 px-4 bg-gray-200">Description</th>
                <th class="py-2 px-4 bg-gray-200">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $consoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $console): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo e($console->name); ?></td>
                    <td class="border px-4 py-2"><?php echo e($console->manufacturer); ?></td>
                    <td class="border px-4 py-2"><?php echo e($console->release_year); ?></td>
                    <td class="border px-4 py-2"><?php echo e($console->generation); ?></td>
                    <td class="border px-4 py-2"><?php echo e($console->discontinued_date); ?></td>
                    <td class="border px-4 py-2"><?php echo e(Str::limit($console->description, 50)); ?></td>
                    <td class="border px-4 py-2">
                        <!-- View Button - Accessible to Admin, Writer, and Member -->
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $console)): ?>
                            <a href="<?php echo e(route('game_consoles.show', $console->id)); ?>" class="bg-blue-500 text-white px-2 py-1">View</a>
                        <?php endif; ?>

                        <!-- Edit Button - Accessible to Admin and Writer -->
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $console)): ?>
                            <a href="<?php echo e(route('game_consoles.edit', $console->id)); ?>" class="bg-yellow-500 text-white px-2 py-1">Edit</a>
                        <?php endif; ?>

                        <!-- Delete Button - Accessible only to Admin -->
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $console)): ?>
                            <form action="<?php echo e(route('game_consoles.destroy', $console->id)); ?>" method="POST" class="inline-block">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="bg-red-500 text-white px-2 py-1" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7" class="text-center py-4">No game consoles found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="mt-4 flex justify-between items-center">
        <div class="text-sm text-gray-700">
            Showing <?php echo e($consoles->firstItem()); ?> to <?php echo e($consoles->lastItem()); ?> of <?php echo e($consoles->total()); ?> results
        </div>
        <div class="flex space-x-1">
            <?php if($consoles->onFirstPage()): ?>
                <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">« Previous</span>
            <?php else: ?>
                <a href="<?php echo e($consoles->previousPageUrl()); ?>" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">« Previous</a>
            <?php endif; ?>

            <?php $__currentLoopData = $consoles->links()->elements[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($consoles->currentPage() == $page): ?>
                    <span class="px-4 py-2 bg-blue-500 text-white rounded"><?php echo e($page); ?></span>
                <?php else: ?>
                    <a href="<?php echo e($url); ?>" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded"><?php echo e($page); ?></a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($consoles->hasMorePages()): ?>
                <a href="<?php echo e($consoles->nextPageUrl()); ?>" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">Next »</a>
            <?php else: ?>
                <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">Next »</span>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ITS\Matkul\Semester 5\PBKK\Tugas 2\tugas2\resources\views/game_consoles/index.blade.php ENDPATH**/ ?>