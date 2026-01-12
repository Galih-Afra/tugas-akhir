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
        ➕ Tambah Chapter - <?php echo e($comic->title); ?>

     <?php $__env->endSlot(); ?>

    <div class="p-6 max-w-xl mx-auto">
        <form action="<?php echo e(route('admin.comics.chapters.store', $comic)); ?>" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?>

            <div>
                <label>Judul Chapter</label>
                <input type="text" name="title" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label>Nomor Chapter</label>
                <input type="number" name="chapter_number" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label>Isi Chapter</label>
                <textarea name="content" class="w-full border rounded p-2" rows="10" required></textarea>
            </div>

            <button type="submit" class="bg-indigo-600 text-black px-4 py-2 rounded">
                Simpan Chapter
            </button>
        </form>
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
<?php /**PATH C:\laragon\www\komik-reader\resources\views/admin/chapters/create.blade.php ENDPATH**/ ?>