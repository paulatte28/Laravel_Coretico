

<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if(Auth::check()): ?>
        <h1>Diary Entries</h1>
    <?php else: ?>
        <h1>Please log in to see your diary entries.</h1>
    <?php endif; ?>

    <a href="<?php echo e(route('diary.create')); ?>" class="btn btn-primary">Create New Entry</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $diaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($diary->title); ?></td>
                <td>
                    <a href="<?php echo e(route('diary.show', $diary->id)); ?>" class="btn btn-info">View</a>
                    <a href="<?php echo e(route('diary.edit', $diary->id)); ?>" class="btn btn-warning">Edit</a>
                    <form action="<?php echo e(route('diary.destroy', $diary->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel_Coretico\resources\views/diary/index.blade.php ENDPATH**/ ?>