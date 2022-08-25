<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Vehical Expense</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
		  <div class="col-md-8" style="height: 700px;overflow-y: scroll;">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Vehical Expense </h3>

              <div class="box-tools">
                <form action="<?php echo e(route('search_vh')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                <div class="input-group input-group-sm" style="width: 250px;">
                  <input type="text" name="mobile" class="form-control pull-right" placeholder="Search By Name">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>

                </div>
                 </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Date</th>
                  <th>Motor Name</th>
                  <th>Motor No</th>
                  <th>Info</th>
                  <th>Fuel</th>
                  <th>Maintenance</th>
                  
                  <th>Paper Work</th>
                    <th>Total</th>  
                </tr>
              <?php
               $f=0;
               $m=0;
               $b=0;
               $p=0;
               $t=0; 
              ?>
                <?php $__currentLoopData = @$exp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($row->date); ?></td>
                  <td><?php echo e($row->motor_name); ?></td>
                  <td><?php echo e($row->motor_no); ?></td>
                  <td><?php echo e($row->info); ?></td>
                  <td><?php echo e($row->fuel); ?></td>
                  <td><?php echo e($row->maint); ?></td>
                   <td><?php echo e($row->payment_balance); ?></td>
                    <td><?php echo e($row->paper_work); ?></td>
                    <td><?php echo e($row->paper_work+$row->payment_balance+$row->maint+$row->fuel); ?></td>
                <tr>
                  <?php
                    $f +=$row->fuel;
                    $m +=$row->maint;
                    $b +=$row->payment_balance;
                    $p +=$row->paper_work;
                    $t +=$row->paper_work+$row->payment_balance+$row->maint+$row->fuel;
                  ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th><i class="fa fa-rupee"></i><?php echo e($f); ?></th>
                  <th><i class="fa fa-rupee"></i><?php echo e($m); ?></th>
                  <th><i class="fa fa-rupee"></i><?php echo e($b); ?></th>
                  <th><i class="fa fa-rupee"></i><?php echo e($p); ?></th>
                  <th><i class="fa fa-rupee"></i><?php echo e($t); ?></th>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      	<div class="col-md-4">
           <div class="box box-info">
      
            <div class="box-header with-border">

              <h3 class="box-title">Epense Vehical</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo e(route('exp_vehical')); ?>" method="POST">
              <?php echo csrf_field(); ?>
             
              <div class="box-body">
                <div class="form-group">
                  <label for="motor_name" class="col-sm-2 control-label">Motor Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="motor_name" class="form-control" id="motor_name" placeholder="Motor Name">
                  </div>
                </div>
              
              <div class="form-group">
                  <label for="motor_no" class="col-sm-2 control-label">Motor No</label>

                  <div class="col-sm-10">
                    <input type="text" name="motor_no" class="form-control" id="motor_no" placeholder="Motor No">
                  </div>
                </div>             
                <div class="form-group">
                  <label for="info" class="col-sm-2 control-label">Info</label>

                  <div class="col-sm-10">
                    <input type="text" name="info" class="form-control" id="info" placeholder="Info">
                  </div>
                </div>
                <div class="form-group">
                  <label for="fuel" class="col-sm-2 control-label">Fuel</label>

                  <div class="col-sm-10">
                    <input type="text" name="fuel" class="form-control" id="fuel" placeholder="Fuel">
                  </div>
                </div>
                <div class="form-group">
                  <label for="maint" class="col-sm-2 control-label">Maintenance</label>
                  <div class="col-sm-10">
                    <input type="text" name="maint" class="form-control" id="maint" placeholder="Maintenance">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="paper_work" class="col-sm-2 control-label">Paper Work</label>
                  <div class="col-sm-10">
                    <input type="text" name="paper_work" class="form-control" id="paper_work" placeholder="Paper Work">
                  </div>
                </div>
                <div class="form-group">
               <label for="date" class="col-sm-2 control-label">Date:</label>
                <div class="col-sm-10">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="date" class="form-control pull-right" id="datepicker">
                </div>
            </div>
                <!-- /.input group -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
            </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
      </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>