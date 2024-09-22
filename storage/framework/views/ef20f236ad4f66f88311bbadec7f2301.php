

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4"><?php echo e($publisher->name); ?></h1>

        <!-- Publisher Details -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <h2 class="text-xl font-semibold">Founded Date:</h2>
                <p><?php echo e($publisher->founded_date); ?></p>
            </div>
            <div class="mb-4">
                <h2 class="text-xl font-semibold">Headquarters:</h2>
                <p><?php echo e($publisher->headquarters); ?></p>
            </div>
            <div class="mb-4">
                <h2 class="text-xl font-semibold">Website:</h2>
                <?php if($publisher->website): ?>
                    <a href="<?php echo e($publisher->website); ?>" class="text-blue-500 hover:underline" target="_blank"><?php echo e($publisher->website); ?></a>
                <?php else: ?>
                    <p>N/A</p>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <h2 class="text-xl font-semibold">Description:</h2>
                <p><?php echo e($publisher->description); ?></p>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-6">
            <a href="<?php echo e(route('publishers.index')); ?>" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Back to Publishers List
            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ITS\Matkul\Semester 5\PBKK\Tugas 2\tugas2\resources\views/publishers/show.blade.php ENDPATH**/ ?>