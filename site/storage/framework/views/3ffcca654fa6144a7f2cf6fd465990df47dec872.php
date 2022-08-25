<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
   
	
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-md-12">
	<div class="box box-danger">
            <div class="box-header">  
            	 <h1 class="text-center "><img src="svg/logo.svg" style="width: 100px;height: 100px" ></h1>
            <h3 class="text-center " style="color: red;margin-top: 0px;" >LEAGDER (Purchase)</h3>         
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 250px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr style="background-color: red;color: white">
                  <th>Date</th>
                  <th>Reciept_no</th>
                  <th>Perticulars</th>
                  <th>Quantity</th>
                  <th>Credit</th>
                  <th> Debit</th>
                  <th>Balance</th>
                  <th>Action</th>
                </tr>
                <?php
                $total=0;
                  $credit=0;
                  $debit=0;
                ?>
                <?php $__currentLoopData = @$inv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                	<td><?php echo e($row->created_at); ?></td>
                <td><?php echo e($row->reciept_no); ?></td>
                
                <td><?php echo e($row->fruit_name); ?></td>
                <td><?php echo e($row->quantity); ?></td>
                <td><?php echo e($row->debit); ?></td>
                <td><?php echo e($row->credit); ?></td>
                
                <td><?php echo e($row->balance); ?></td>
                <td><form method="POST" action="<?php echo e(route('update_per',[$row->id])); ?>">
                  <?php echo e(csrf_field()); ?>

                  <input type="number" name="amount">
                  <button type="submit" class="btn label label-info"> <i class="fa fa-rupee"></i>&ensp;Add amount</button>
                </form></td>
                </tr>
                 <?php 
                  	  $total +=$row->balance;
                  			$credit+=$row->credit;
                  			$debit+=$row->debit;
                  	
                  ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<tr style="background-color: red;color: white">
					 <th></th>
                  <th></th>
                  <th></th>
                  <th>Total</th>
                  <th><i class="fa fa-rupee"></i><?php echo e($debit); ?></th>
                  <th><i class="fa fa-rupee"></i><?php echo e($credit); ?> </th>
                  <th><i class="fa fa-rupee"></i><?php echo e($total); ?></th>
				</tr>
              </table>
            </div>
             
           
          </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>