

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Categories</h1>

        <!-- Check for authorization before showing the create button -->
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Category::class)): ?>
            <div class="mb-4">
                <a href="<?php echo e(route('categories.create')); ?>" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Add New Category
                </a>
            </div>
        <?php endif; ?>

        <!-- Search Form -->
        <form action="<?php echo e(route('categories.index')); ?>" method="GET" class="mb-4">
            <input 
                type="text" 
                name="search" 
                value="<?php echo e(request('search')); ?>" 
                placeholder="Search by category name"
                class="border rounded px-4 py-2"
            >
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
        </form>

        <!-- Categories Table -->
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200">Name</th>
                    <th class="py-2 px-4 bg-gray-200">Description</th>
                    <th class="py-2 px-4 bg-gray-200">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="border px-4 py-2"><?php echo e($category->name); ?></td>
                        <td class="border px-4 py-2"><?php echo e($category->description); ?></td>
                        <td class="border px-4 py-2 flex space-x-2">
                            <a href="<?php echo e(route('categories.show', $category->id)); ?>" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">View</a>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $category)): ?>
                                <a href="<?php echo e(route('categories.edit', $category->id)); ?>" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $category)): ?>
                                <form action="<?php echo e(route('categories.destroy', $category->id)); ?>" method="POST" class="inline-block">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3" class="text-center py-4">No categories found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4 flex justify-between items-center">
            <div class="text-sm text-gray-700">
                Showing <?php echo e($categories->firstItem()); ?> to <?php echo e($categories->lastItem()); ?> of <?php echo e($categories->total()); ?> results
            </div>
            <div class="flex space-x-1">
                <?php if($categories->onFirstPage()): ?>
                    <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">« Previous</span>
                <?php else: ?>
                    <a href="<?php echo e($categories->previousPageUrl()); ?>" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">« Previous</a>
                <?php endif; ?>

                <?php $__currentLoopData = $categories->links()->elements[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($categories->currentPage() == $page): ?>
                        <span class="px-4 py-2 bg-blue-500 text-white rounded"><?php echo e($page); ?></span>
                    <?php else: ?>
                        <a href="<?php echo e($url); ?>" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded"><?php echo e($page); ?></a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if($categories->hasMorePages()): ?>
                    <a href="<?php echo e($categories->nextPageUrl()); ?>" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">Next »</a>
                <?php else: ?>
                    <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">Next »</span>
                <?php endif; ?>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ITS\Matkul\Semester 5\PBKK\Tugas 2\tugas2\resources\views/categories/index.blade.php ENDPATH**/ ?>