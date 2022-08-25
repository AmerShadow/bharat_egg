<?php $__env->startSection('content'); ?>
<div class="row p-0 m-0 justify-content-center" >
	<div class="col-md-10 card p-3 m-2">
		<div class="text-center">
			<img class="" src="<?php echo e(asset('img/logo.png')); ?>" width="100px" height="80px">
		</div>
		
		<h3 class="h3 text-center"><?php echo e(@App\Test::where('id',$id)->value('title')); ?></h3>
		<h5 class="h5 text-center">No Questions:<?php echo e(@App\Test::where('id',$id)->value('no_qtn')); ?>&ensp;&ensp;Marks:<?php echo e(@App\Test::where('id',$id)->value('marks')); ?>&ensp;&ensp;No Duration:<?php echo e(@App\Test::where('id',$id)->value('duration')); ?>&ensp;&ensp;</h4>
		<hr>
		<div class="text-right">
			<a class="btn btn-sm btn-info">Print</a>
		</div>
		
		<div class="p-4">

			<?php $__currentLoopData = $qtn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<h5 class="h5 text-left">1)&ensp;<?php echo e($row->qtn); ?></h5>
			<div class="row p-0 m-0">
				<div class="col-md-6">
					<h6 class="h5 text-left">A)&ensp;<?php echo e($row->A); ?></h6>
				</div>
				<div class="col-md-6">
					<h6 class="h5 text-left">B)&ensp;<?php echo e($row->B); ?></h6>
				</div>
				<div class="col-md-6">
					<h6 class="h5 text-left">C)&ensp;<?php echo e($row->C); ?></h6>
				</div>
				<div class="col-md-6">
					<h6 class="h5 text-left">D)&ensp;<?php echo e($row->D); ?></h6>
				</div>
				<div class="col-md-6">
					<h6 class="h5 text-left">Answer)&ensp;<?php echo e($row->ans); ?></h6>
				</div>
			</div>
				
			
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
		
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>