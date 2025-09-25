<?php $__env->startSection('title', __($exception->getMessage())); ?>
<?php $__env->startSection('code', '404'); ?>
<?php $__env->startSection('message', __($exception->getMessage())); ?>

<?php echo $__env->make('errors::minimal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\docs-helper\vendor\laravel\framework\src\Illuminate\Foundation\Exceptions/views/404.blade.php ENDPATH**/ ?>
