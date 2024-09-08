

<?php $__env->startSection('content'); ?>
<div class="container mx-auto mt-4">
    <h2 class="text-2xl font-bold"><?php echo e(isset($user) ? 'Edit User' : 'Create New User'); ?></h2>

    <form method="POST" action="<?php echo e(isset($user) ? route('users.update', $user->id) : route('users.store')); ?>">
        <?php echo csrf_field(); ?>
        <?php if(isset($user)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" value="<?php echo e(old('name', isset($user) ? $user->name : '')); ?>" class="w-full px-4 py-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" value="<?php echo e(old('email', isset($user) ? $user->email : '')); ?>" class="w-full px-4 py-2 border rounded">
        </div>

        <!-- Role selection -->
        <div class="mb-4">
            <label for="role" class="block text-gray-700">Role</label>
            <select name="role" class="w-full px-4 py-2 border rounded">
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($role->id); ?>" <?php echo e(isset($user) && $user->roles->contains($role->id) ? 'selected' : ''); ?>>
                        <?php echo e($role->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            <?php echo e(isset($user) ? 'Update User' : 'Create User'); ?>

        </button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ITS\Matkul\Semester 5\PBKK\Tugas 2\tugas2\resources\views/users/edit.blade.php ENDPATH**/ ?>