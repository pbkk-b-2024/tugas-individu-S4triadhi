<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genap dan Ganjil</title>
</head>
<body>
    <h1>Genap dan Ganjil for n = <?php echo e($n); ?></h1>
    <ul>
        <?php $__currentLoopData = $numbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($number['number']); ?> is <?php echo e($number['type']); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</body>
</html>
<?php /**PATH D:\# ITS\# Matkul\Semester 5\PBKK\Tugas 1\tugas1\resources\views/number/genapGanjil.blade.php ENDPATH**/ ?>