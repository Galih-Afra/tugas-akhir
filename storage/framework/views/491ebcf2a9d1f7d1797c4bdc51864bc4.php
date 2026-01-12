<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                📚 Manajemen Novel
            </h2>

            <a href="<?php echo e(route('admin.comics.create')); ?>"
                class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                + Tambah Novel
            </a>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg overflow-hidden">

                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse">
                        <thead class="bg-gray-100 text-gray-600 text-sm uppercase">
                            <tr>
                                <th class="px-6 py-3 text-left">Cover</th>
                                <th class="px-6 py-3 text-left">Judul</th>
                                <th class="px-6 py-3 text-left">Deskripsi</th>
                                <th class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            <?php $__empty_1 = true; $__currentLoopData = $comics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover:bg-gray-50 transition">

                                    
                                    <td class="px-6 py-4">
                                        <?php if($comic->cover_image): ?>
                                            <img src="<?php echo e($comic->cover_image); ?>"
                                                 class="w-12 h-16 object-cover rounded shadow">
                                        <?php else: ?>
                                            <div class="w-12 h-16 bg-gray-200 flex items-center justify-center rounded text-xs text-gray-500">
                                                N/A
                                            </div>
                                        <?php endif; ?>
                                    </td>

                                    
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        <?php echo e($comic->title); ?>

                                    </td>

                                    
                                    <td class="px-6 py-4 text-gray-600 text-sm">
                                        <?php echo e(\Illuminate\Support\Str::limit($comic->description, 60)); ?>

                                    </td>

                                    
                                    <td class="px-6 py-4 text-center space-x-2">
                                        <a href="<?php echo e(route('admin.comics.show', $comic)); ?>"
                                            class="px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 text-sm">
                                            Detail
                                        </a>

                                        <a href="<?php echo e(route('admin.comics.edit', $comic)); ?>"
                                            class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 text-sm">
                                            Edit
                                        </a>

                                        <form action="<?php echo e(route('admin.comics.destroy', $comic)); ?>" method="POST" class="inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button onclick="return confirm('Yakin ingin menghapus?')"
                                                class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 text-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="text-center py-8 text-gray-500">
                                        Belum ada data komik.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="p-4">
                    <?php echo e($comics->links()); ?>

                </div>

            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\komik-reader\resources\views/admin/comics/index.blade.php ENDPATH**/ ?>