<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Categories</title>
    <!-- Tambahkan Tailwind CSS melalui CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-5">
        <div class="grid grid-cols-1">
            <div class="col-span-1">

                <?php if(session('status')): ?>
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>

                <div class="bg-white rounded-lg shadow">
                    <div class="px-6 py-4 border-b">
                        <h4 class="text-lg font-semibold text-gray-700">
                            Add Categories
                            <a href="<?php echo e(url('categories')); ?>" class="inline-block px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 float-right">Back</a>
                        </h4>
                    </div>
                    <div class="p-6">
                        <form action="<?php echo e(url('categories/create')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" id="name" name="name" class="block w-full px-3 py-2 mt-1 text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="<?php echo e(old('name')); ?>" />
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                                    <span class="text-sm text-red-600"><?php echo e($message); ?></span> 
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea id="description" name="description" rows="3" class="block w-full px-3 py-2 mt-1 text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"><?php echo e(old('description')); ?></textarea>
                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                                    <span class="text-sm text-red-600"><?php echo e($message); ?></span> 
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-4">
                                <label for="is_active" class="inline-flex items-center text-sm font-medium text-gray-700">
                                    <input type="checkbox" id="is_active" name="is_active" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" <?php echo e(old('is_active') == true ? 'checked' : ''); ?> />
                                    <span class="ml-2">Is Active</span>
                                </label>
                                <?php $__errorArgs = ['is_active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                                    <span class="text-sm text-red-600"><?php echo e($message); ?></span> 
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-4">
                                <label for="image" class="block text-sm font-medium text-gray-700">Upload File/Image</label>
                                <input type="file" id="image" name="image" class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH D:\ITS\Matkul\Semester5\PBKK\Tugas 5\TUGAS5\resources\views/category/create.blade.php ENDPATH**/ ?>