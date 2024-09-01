<h1>Prima Check for n = <?php echo e($n); ?></h1>
<ul>
    <?php $__currentLoopData = $numbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($number['number']); ?> is <?php echo e($number['is_prime'] ? 'Prima' : 'Bukan Prima'); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH D:\# ITS\# Matkul\Semester 5\PBKK\Tugas 1\tugas1\resources\views/number/prima.blade.php ENDPATH**/ ?>