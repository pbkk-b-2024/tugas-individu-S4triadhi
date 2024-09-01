

<?php $__env->startSection('title', 'Route Groups'); ?>

<?php $__env->startSection('page-title', 'Route Groups'); ?>

<?php $__env->startSection('content'); ?>
    <p>Beberapa contoh dari Route Groups</p>

    <!-- Add buttons for Group Page 1 and Group Page 2 -->
    <div class="btn-group">
        <a href="<?php echo e(route('group.page1')); ?>" class="btn btn-primary">Group Page 1</a>
        <a href="<?php echo e(route('group.page2')); ?>" class="btn btn-primary">Group Page 2</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\# ITS\# Matkul\Semester 5\PBKK\Tugas 1\tugas1\resources\views/routes/group.blade.php ENDPATH**/ ?>