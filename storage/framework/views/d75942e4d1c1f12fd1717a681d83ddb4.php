<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <!-- Tambahkan Tailwind CSS melalui CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-5">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow">
                    <div class="px-6 py-4 border-b">
                        <h4 class="text-lg font-semibold text-gray-700">
                            Categories
                            <a href="<?php echo e(url('categories/create')); ?>" class="inline-block px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 float-right">Add Category</a>
                        </h4>
                    </div>
                    <div class="p-6">
                        <table class="min-w-full border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 text-left border border-gray-300">ID</th>
                                    <th class="px-4 py-2 text-left border border-gray-300">Name</th>
                                    <th class="px-4 py-2 text-left border border-gray-300">Description</th>
                                    <th class="px-4 py-2 text-left border border-gray-300">Image</th>
                                    <th class="px-4 py-2 text-left border border-gray-300">Is Active</th>
                                    <th class="px-4 py-2 text-left border border-gray-300">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 border border-gray-300"><?php echo e($item->id); ?></td>
                                    <td class="px-4 py-2 border border-gray-300"><?php echo e($item->name); ?></td>
                                    <td class="px-4 py-2 border border-gray-300"><?php echo e($item->description); ?></td>
                                    <td class="px-4 py-2 border border-gray-300">
                                        <img src="<?php echo e(asset($item->image)); ?>" class="w-16 h-16 rounded" alt="Img" />
                                    </td>
                                    <td class="px-4 py-2 border border-gray-300">
                                        <?php if($item->is_active): ?>
                                            <span class="px-2 py-1 text-sm text-white bg-green-500 rounded">Active</span>
                                        <?php else: ?>
                                            <span class="px-2 py-1 text-sm text-white bg-red-500 rounded">In-Active</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-4 py-2 border border-gray-300">
                                        <a href="<?php echo e(url('categories/'.$item->id.'/edit')); ?>" class="inline-block px-3 py-1 text-white bg-green-500 rounded hover:bg-green-600 mx-1">Edit</a>
                                        <a href="<?php echo e(url('categories/'.$item->id.'/delete')); ?>" class="inline-block px-3 py-1 text-white bg-red-500 rounded hover:bg-red-600 mx-1" onclick="return confirm('Are you sure ?')">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH D:\ITS\Matkul\Semester5\PBKK\Tugas 5\TUGAS5\resources\views/category/index.blade.php ENDPATH**/ ?>