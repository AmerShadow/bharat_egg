<?php $__env->startSection('content'); ?>
<div class="row justify-content-md-center p-0 m-0">
	<div class="col-lg-12 text-center">
	<?php echo $__env->make('partials.alert', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<div class="container mt-5">
				<div class="card z-depth-5  text-center  p-5 mb-2">
				<div class="row justify-content-md-center p-0 m-0">
					<div class="card p-3 z-depth-5 col-lg-6 white-text default-color mb-4" style="margin-top: -4rem"><h3>Question Papers</h3></div>
				</div>
					<div class="table-responsive">
	<table class="table table-fixed ">
	  <thead class="">
	    <tr>
	      
	      <th scope="col">Test Title</th>
	      <th scope="col">Marks</th>
	      <th scope="col">Status</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $__currentLoopData = @$test; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		  <tr>
		  	<td> <?php echo e($row->title); ?></td>
		  	<td> <?php echo e($row->marks); ?></td>
		  	<td> <?php if($row->status==1): ?><font class="text-success">Submited</font><?php else: ?><font class="text-danger">Not Sumited</font><?php endif; ?></td>
		  	<td><?php if($row->status==0): ?> <a href="<?php echo e(route('admin.qtn',$row->id)); ?>" class="badge badge-primary p-2">Add Questions </a>
<?php else: ?><a href="<?php echo e(route('admin.show.paper',$row->id)); ?>" class="badge badge-secondary p-2">See Details</a><?php endif; ?>
		  	</td>
		  </tr>
		 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	  </tbody>
	</table>
	  </div>
				</div>
			</div>
		</div>
	<div class="col-lg-6 text-center">
		<div class="container mt-5">
			<div class="card z-depth-5  text-center  p-5 mb-2">
			<div class="row justify-content-md-center p-0 m-0">
					<div class="card p-3 z-depth-5 col-lg-9 white-text secondary-color mb-4" style="margin-top: -4rem"><h3>Make New Paper </h3></div>
				</div>
			
				<form action="<?php echo e(route('admin.sub.paper')); ?>" method="POST">
				<?php echo e(csrf_field()); ?>

					<input class="form-control mb-4" type="text" placeholder="Title" name="title" autofocus>
					<input class="form-control mb-4" type="text" placeholder="marks" name="marks">
					<input class="form-control mb-4" type="text" placeholder="No Of Questions" name="no_qtn">
					<input class="form-control mb-4" type="text" placeholder="Duration In Minute" name="duration">

					<button class="btn btn-md btn-outline-secondary" type="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>

	
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>