<?php $__env->startSection('content'); ?>

<div class="row justify-content-center p-0 m-0">
	<div class="col-lg-12 text-center">
		<?php echo $__env->make('partials.alert', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<div class="container mt-5">
					<div class="card z-depth-5  text-center  p-5 mb-2">
					<h3><?php echo e(@App\Test::where('id',$id)->value('title')); ?></h3>
					
						<div class="table-responsive">
		<table class="table table-fixed ">
		  <thead class="black white-text">
		    <tr>
		      
		      <th scope="col">Question</th>
		      <th scope="col">Subject</th>
		      <th scope="col">Options</th>
		      <th scope="col">Ans</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php $__currentLoopData = @App\Question::where('test_id',$id)->where('type','T')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			  <tr>
			  	<td> <?php echo e($row->qtn); ?></td>
			  	<td> <?php echo e(App\Subject::where('id',$row->subject)->value('name')); ?></td>
			  	<td> A:-<?php echo e($row->A); ?><br>B:-<?php echo e($row->B); ?><br>C:-<?php echo e($row->C); ?><br>D:-<?php echo e($row->D); ?><br></td>
			  	<td><?php echo e($row->ans); ?></td>
			  	<td> <a href="<?php echo e(route('del.qtn',$row->id)); ?>" class="badge badge-danger p-2">Delete Question </a>

			  	</td>
			  </tr>
			 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  </tbody>
		</table>
		  </div>
		  <div class="table-responsive">
		<table class="table table-fixed ">
		  <thead class="black white-text">
		    <tr>
		      
		      <th scope="col">Image</th>
		      <th scope="col">Subject</th>
		      <th scope="col">Answer</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php $__currentLoopData = @App\Question::where('test_id',$id)->where('type','I')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			  <tr>
			  	<td> <img src="<?php echo e(asset('public/questions/'.$row->path)); ?>"></td>
			  	<td> <?php echo e(App\Subject::where('id',$row->subject)->value('name')); ?></td>
			  	
			  	<td><?php echo e($row->ans); ?></td>
			  	<td> <a href="<?php echo e(route('del.qtn',$row->id)); ?>" class="badge badge-danger p-2">Delete Question </a>

			  	</td>
			  </tr>
			 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  </tbody>
		</table>
		  </div>
		  <div class="col-lg-12 text-center">
		<a class="btn btn-outline-success" href="<?php echo e(route('save',$id)); ?>">save </a>
	</div>
					</div>
				</div>
		</div>



	<div class="col-lg-6 text-center">
		<div class="container mt-5">
			<div class="card z-depth-5  text-center  p-3 mb-2">
			<h3>Add Question</h3>
		
			<form action="<?php echo e(route('admin.sub.qtn')); ?>" method="POST">
			<?php echo e(csrf_field()); ?>

				<select class="select mb-4 mt-4" name="sub" id="ans" required>
	                            <option value="">Select Subject</option>

	                           <?php $__currentLoopData = App\Subject::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                           		<option value="<?php echo e($row->name); ?>"><?php echo e($row->name); ?></option>
	                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                            
	            </select>
	            <textarea class="md-textarea form-control mb-4" row="5" name="qtn">Type question Here </textarea>
				<input class="form-control mb-4" type="text" placeholder="Option A" name="optn1">
				<input class="form-control mb-4" type="text" placeholder="Option B" name="optn2">
				<input class="form-control mb-4" type="text" placeholder="Option C" name="optn3">
				<input class="form-control mb-4" type="text" placeholder="Option D" name="optn4">
				<select class="select mb-4" name="ans" id="ans" required>
	                            <option value="">Select Answer</option>
	                          
	                           		<option value="A">A</option>
	                           		<option value="B">B</option>
	                           		<option value="C">C</option>
	                           		<option value="D">D</option>
	                           
	                            
	            </select>
	            <input type="text" name="test_id" value="<?php echo e($id); ?>" class="d-none">
				<button class="btn btn-md btn-outline-secondary" type="submit">Submit</button>
			</form>
			</div>
		</div>
	</div>
<div class="col-md-6">
	<div class="row p-0 m-0">
			<div class="col-lg-12 text-center">
		<div class="container mt-5">

			<div class="card z-depth-5  text-center  p-3 mb-2">
				 <?php if( Session::has('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong><?php echo e(Session::get('success')); ?></strong>
    </div>
    <?php endif; ?>
 
    <?php if( Session::has('error') ): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong><?php echo e(Session::get('error')); ?></strong>
    </div>
    <?php endif; ?>
 
    <?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      <div>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endif; ?>
 
			<h3>Import Questions(Excell sheet)</h3>
		
			<form action="<?php echo e(route('import')); ?>" method="POST" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>

    Choose your xls/csv File : <input type="file" name="file" class="form-control">
				
	            <input type="text" name="test_id" value="<?php echo e($id); ?>" class="d-none">

				<button class="btn btn-md btn-outline-secondary" type="submit">Submit</button>
			</form>
			</div>
		</div>
	</div>


	<div class="col-lg-12 text-center">
		<div class="container mt-5">

			<div class="card z-depth-5  text-center  p-3 mb-2">
				 <?php if( Session::has('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong><?php echo e(Session::get('success')); ?></strong>
    </div>
    <?php endif; ?>
 
    <?php if( Session::has('error') ): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong><?php echo e(Session::get('error')); ?></strong>
    </div>
    <?php endif; ?>
 
    <?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      <div>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endif; ?>
 
			<h3>Import Questions(image format)</h3>
		
			<form action="<?php echo e(route('image')); ?>" method="POST" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>

			<select class="select mb-4 mt-4" name="subject" id="ans" required>
	                            <option value="">Select Subject</option>
	                            
	                           <?php $__currentLoopData = App\Subject::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                           		<option value="<?php echo e($row->name); ?>"><?php echo e($row->name); ?></option>
	                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                            
	            </select>
    Choose your image File : <input type="file" name="image" class="form-control">
    <select class="select mb-4" name="ans" id="ans" required>
	                            <option value="">Select Answer</option>
	                          
	                           		<option value="A">A</option>
	                           		<option value="B">B</option>
	                           		<option value="C">C</option>
	                           		<option value="D">D</option>
	                           
	                            
	            </select>
				
	            <input type="text" name="test_id" value="<?php echo e($id); ?>" class="d-none">
				<button class="btn btn-md btn-outline-secondary" type="submit">Submit</button>
			</form>
			</div>
		</div>
	</div>
	</div>
</div>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>