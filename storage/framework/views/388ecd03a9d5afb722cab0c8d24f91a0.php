

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Developers</h1>

        <!-- Button to Create New Developer -->
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Developer::class)): ?>
            <div class="mb-4">
                <a href="<?php echo e(route('developers.create')); ?>" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Add New Developer
                </a>
            </div>
        <?php endif; ?>

        <!-- Search Form -->
        <form action="<?php echo e(route('developers.index')); ?>" method="GET" class="mb-4">
            <input 
                type="text" 
                name="search" 
                value="<?php echo e(request('search')); ?>" 
                placeholder="Search by developer name"
                class="border rounded px-4 py-2"
            >
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
        </form>

        <!-- Developers Table -->
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200">Name</th>
                    <th class="py-2 px-4 bg-gray-200">Founded Date</th>
                    <th class="py-2 px-4 bg-gray-200">Headquarters</th>
                    <th class="py-2 px-4 bg-gray-200">Website</th>
                    <th class="py-2 px-4 bg-gray-200">Description</th>
                    <th class="py-2 px-4 bg-gray-200">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $developers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $developer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="border px-4 py-2"><?php echo e($developer->name); ?></td>
                        <td class="border px-4 py-2"><?php echo e($developer->founded_date); ?></td>
                        <td class="border px-4 py-2"><?php echo e($developer->headquarters); ?></td>
                        <td class="border px-4 py-2">
                            <a href="<?php echo e($developer->website); ?>" class="text-blue-500" target="_blank"><?php echo e($developer->website); ?></a>
                        </td>
                        <td class="border px-4 py-2"><?php echo e($developer->description); ?></td>
                        <td class="border px-4 py-2 flex space-x-2">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $developer)): ?>
                                <a href="<?php echo e(route('developers.show', $developer->id)); ?>" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">View</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $developer)): ?>
                                <a href="<?php echo e(route('developers.edit', $developer->id)); ?>" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $developer)): ?>
                                <form action="<?php echo e(route('developers.destroy', $developer->id)); ?>" method="POST" class="inline-block">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center py-4">No developers found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4 flex justify-between items-center">
            <div class="text-sm text-gray-700">
                Showing <?php echo e($developers->firstItem()); ?> to <?php echo e($developers->lastItem()); ?> of <?php echo e($developers->total()); ?> results
            </div>
            <div class="flex space-x-1">
                <?php if($developers->onFirstPage()): ?>
                    <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">« Previous</span>
                <?php else: ?>
                    <a href="<?php echo e($developers->previousPageUrl()); ?>" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">« Previous</a>
                <?php endif; ?>

                <?php $__currentLoopData = $developers->links()->elements[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($developers->currentPage() == $page): ?>
                        <span class="px-4 py-2 bg-blue-500 text-white rounded"><?php echo e($page); ?></span>
                    <?php else: ?>
                        <a href="<?php echo e($url); ?>" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded"><?php echo e($page); ?></a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if($developers->hasMorePages()): ?>
                    <a href="<?php echo e($developers->nextPageUrl()); ?>" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">Next »</a>
                <?php else: ?>
                    <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">Next »</span>
                <?php endif; ?>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ITS\Matkul\Semester 5\PBKK\Tugas 2\tugas2\resources\views/developers/index.blade.php ENDPATH**/ ?>