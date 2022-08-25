<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Catagory</h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::employee', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>