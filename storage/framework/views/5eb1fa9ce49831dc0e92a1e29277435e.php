

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1><?php echo e($diary->title); ?></h1>
    <p><?php echo e($diary->content); ?></p>
    <a href="<?php echo e(route('diary.edit', $diary->id)); ?>" class="btn btn-warning">Edit</a>
    <form action="<?php echo e(route('diary.destroy', $diary->id)); ?>" method="POST" style="display:inline;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="<?php echo e(route('diary.index')); ?>" class="btn btn-secondary">Back to Diary</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel_Coretico\resources\views/diary/show.blade.php ENDPATH**/ ?>