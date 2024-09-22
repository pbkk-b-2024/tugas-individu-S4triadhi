

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Developer Details</h1>

        <!-- Developer Details Card -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <h2 class="text-xl font-semibold">Name: <?php echo e($developer->name); ?></h2>
                <p class="text-gray-700">Founded Date: <?php echo e($developer->founded_date); ?></p>
                <p class="text-gray-700">Headquarters: <?php echo e($developer->headquarters); ?></p>
                <p class="text-gray-700">Website: 
                    <a href="<?php echo e($developer->website); ?>" class="text-blue-500" target="_blank"><?php echo e($developer->website); ?></a>
                </p>
                <p class="text-gray-700">Description: <?php echo e($developer->description); ?></p>
            </div>

            <!-- Buttons to Go Back, Edit or Delete -->
            <div class="flex space-x-4">
                <a href="<?php echo e(route('developers.index')); ?>" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back to List</a>
                <a href="<?php echo e(route('developers.edit', $developer->id)); ?>" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
                <form action="<?php echo e(route('developers.destroy', $developer->id)); ?>" method="POST" class="inline-block">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" type="submit" onclick="return confirm('Are you sure you want to delete this developer?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ITS\Matkul\Semester 5\PBKK\Tugas 2\tugas2\resources\views/developers/show.blade.php ENDPATH**/ ?>