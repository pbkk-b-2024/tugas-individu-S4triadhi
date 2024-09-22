

<?php $__env->startSection('content'); ?>
<div class="container mx-auto mt-4">
    <h2 class="text-2xl font-bold mb-4">Roles</h2>

    <?php if(auth()->user()->hasRole('Admin')): ?> 
        <!-- Search Form -->
        <form action="<?php echo e(route('roles.index')); ?>" method="GET" class="mb-4">
            <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Search by role name..." class="border px-4 py-2 rounded-lg w-full md:w-1/2 lg:w-1/3">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2 inline-block">Search</button>
        </form>

        <!-- Button to add new role -->
        <a href="<?php echo e(route('roles.create')); ?>" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Role</a>

        <!-- Roles Table -->
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-800 border-b border-gray-300">
                    <th class="px-4 py-2 border-r border-gray-300">Role Name</th>
                    <th class="px-4 py-2 border-r border-gray-300">Quantity</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="px-4 py-2 border-b border-gray-300"><?php echo e($role->name); ?></td>
                        <td class="px-4 py-2 border-b border-gray-300"><?php echo e($role->users_count); ?></td>
                        <td class="px-4 py-2 border-b border-gray-300">
                            <a href="<?php echo e(route('roles.edit', $role->id)); ?>" class="bg-yellow-500 text-white px-2 py-1">Edit</a>
                            <form action="<?php echo e(route('roles.destroy', $role->id)); ?>" method="POST" class="inline-block">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="bg-red-500 text-white px-2 py-1" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3" class="text-center py-4">No roles found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4 flex justify-between items-center">
            <div class="text-sm text-gray-700">
                Showing <?php echo e($roles->firstItem()); ?> to <?php echo e($roles->lastItem()); ?> of <?php echo e($roles->total()); ?> results
            </div>
            <div class="flex space-x-1">
                <?php if($roles->onFirstPage()): ?>
                    <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">« Previous</span>
                <?php else: ?>
                    <a href="<?php echo e($roles->previousPageUrl()); ?>" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">« Previous</a>
                <?php endif; ?>
        
                <?php $__currentLoopData = $roles->links()->elements[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($roles->currentPage() == $page): ?>
                        <span class="px-4 py-2 bg-blue-500 text-white rounded"><?php echo e($page); ?></span>
                    <?php else: ?>
                        <a href="<?php echo e($url); ?>" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded"><?php echo e($page); ?></a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                <?php if($roles->hasMorePages()): ?>
                    <a href="<?php echo e($roles->nextPageUrl()); ?>" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">Next »</a>
                <?php else: ?>
                    <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">Next »</span>
                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>
        <p class="text-red-500">You do not have permission to view this page.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ITS\Matkul\Semester 5\PBKK\Tugas 2\tugas2\resources\views/roles/index.blade.php ENDPATH**/ ?>