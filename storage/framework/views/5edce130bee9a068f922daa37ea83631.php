

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4"><?php echo e($category->name); ?></h1>

    <div class="mb-4">
        <strong>Description:</strong>
        <p><?php echo e($category->description); ?></p>
    </div>

    <a href="<?php echo e(route('categories.edit', $category->id)); ?>" class="bg-yellow-500 text-white px-4 py-2 rounded-md">Edit</a>

    <form action="<?php echo e(route('categories.destroy', $category->id)); ?>" method="POST" class="inline-block">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ITS\Matkul\Semester 5\PBKK\Tugas 2\tugas2\resources\views/categories/show.blade.php ENDPATH**/ ?>