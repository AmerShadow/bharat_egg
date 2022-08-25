<?php $__env->startSection('content'); ?>
<div class="col-md-9">
	<div class="card p-5">
		<h4 class="h4">Question No: </h4>
		<p class="pl-5 font-weight-bold">
			<?php echo e($qtn->qtn); ?>

		</p> 
		
		<?php echo e($qtn->A); ?>

		<?php echo e(session('qtn_id')); ?>

		<a class="btn btn-primary" href="<?php echo e(route('paper',$test_id)); ?>">Next</a>
	</div>
</div>
<div class="col-md-3">
</div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.testLayout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>