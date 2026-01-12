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
        📚 Chapter - <?php echo e($comic->title); ?>

     <?php $__env->endSlot(); ?>

    <div class="p-6 space-y-6">

        <!-- Tombol Tambah Chapter -->
        <a href="<?php echo e(route('admin.comics.chapters.create', $comic)); ?>"
           class="bg-indigo-600 text-black px-4 py-2 rounded">
            + Tambah Chapter
        </a>

        <!-- Daftar Chapter -->
        <?php $__empty_1 = true; $__currentLoopData = $chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white p-4 rounded shadow">
                <h2 class="font-bold">
                    Chapter <?php echo e($chapter->chapter_number); ?> - <?php echo e($chapter->title); ?>

                </h2>

                <!-- Form Upload Pages -->
                <form action="<?php echo e(route('admin.comics.chapters.pages.upload', [$comic, $chapter])); ?>"
                      method="POST"
                      enctype="multipart/form-data"
                      class="mt-3 space-y-2">
                    <?php echo csrf_field(); ?>

                    <input type="file" name="pages[]" multiple required>

                    <button class="bg-green-600 text-black px-3 py-1 rounded">
                        Upload Pages
                    </button>
                </form>

                <!-- Tombol Hapus Chapter (optional) -->
                <form action="<?php echo e(route('admin.comics.chapters.destroy', [$comic, $chapter])); ?>"
                      method="POST"
                      class="mt-2">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="bg-red-600 text-white px-3 py-1 rounded"
                            onclick="return confirm('Yakin ingin menghapus chapter ini?')">
                        Hapus Chapter
                    </button>
                </form>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-gray-500">Belum ada chapter.</p>
        <?php endif; ?>

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
<?php /**PATH C:\laragon\www\komik-reader\resources\views/admin/chapters/index.blade.php ENDPATH**/ ?>