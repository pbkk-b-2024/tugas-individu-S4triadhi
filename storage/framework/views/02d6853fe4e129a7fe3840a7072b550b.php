

<?php $__env->startSection('title', 'Parameter Routing'); ?>

<?php $__env->startSection('page-title', 'Parameter Routing'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Form untuk Parameter 1 -->
    <form action="<?php echo e(route('parameter.update', ['param1' => $param1, 'param2' => $param2])); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="param1">Parameter 1:</label>
            <input type="text" id="param1" name="param1" class="form-control" value="<?php echo e(old('param1', $param1)); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit Parameter 1</button>
    </form>

    <!-- Form untuk Parameter 2 -->
    <form action="<?php echo e(route('parameter.update', ['param1' => $param1, 'param2' => $param2])); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="param2">Parameter 2:</label>
            <input type="text" id="param2" name="param2" class="form-control" value="<?php echo e(old('param2', $param2)); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit Parameter 2</button>
    </form>

    <?php if($param1 || $param2): ?>
        <h3>Entered Parameters:</h3>
        <p>Parameter 1: <?php echo e($param1); ?></p>
        <p>Parameter 2: <?php echo e($param2); ?></p>

        <h4>Preview URL:</h4>
        <p><?php echo e(url('/parameter/' . urlencode($param1) . '/' . urlencode($param2))); ?></p>
    <?php endif; ?>

    <a href="<?php echo e(route('home')); ?>" class="btn btn-secondary">Go Back to Pertemuan 1</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\# ITS\# Matkul\Semester 5\PBKK\Tugas 1\tugas1\resources\views/parameter/index.blade.php ENDPATH**/ ?>