<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>My Credit</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
		  <div class="col-md-8">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">My Credit </h3>

              <div class="box-tools">
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr> 
                  <th>Name</th>
                  <th>Amount</th>
                  <th>Diposit</th>
                  <th>Balance</th>
                  <th>Date</th>
                     
                </tr>
                <?php
                  $a=0;
                  $d=0;
                  $b=0;
                ?>
                <?php $__currentLoopData = @$my; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($row->name); ?></td>
                  <td><?php echo e($row->amount); ?></td>
                  <td><?php echo e($row->diposit); ?></td>
                  <td><?php echo e($row->balance); ?></td>
                  <td><?php echo e($row->date); ?></td>
                 </tr> 
                 <?php
                  $a +=$row->amount;
                  $d +=$row->diposit;
                  $b +=$row->balance;
                 ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <th></th>
                  <th><i class="fa fa-rupee"></i><?php echo e($a); ?></th>
                  <th><i class="fa fa-rupee"></i><?php echo e($d); ?></th>
                  <th><i class="fa fa-rupee"></i><?php echo e($a-$d); ?></th>
                  <th></th>
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

              <h3 class="box-title">Epense Labour</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo e(route('my_credit')); ?>" method="POST">
              <?php echo csrf_field(); ?>
             
                <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                  </div>
                </div>
              </div>         
                <div class="form-group">
                  <label for="amount" class="col-sm-2 control-label">Amount</label>

                  <div class="col-sm-10">
                    <input type="text" name="amount" class="form-control" id="amount" placeholder="Amount">
                  </div>
                </div>
                <div class="form-group">
                  <label for="diposit" class="col-sm-2 control-label">Diposit</label>

                  <div class="col-sm-10">
                    <input type="text" name="diposit" class="form-control" id="diposit" placeholder="Diposit">
                  </div>
                </div>
                <div class="form-group">
                  <label for="balance" class="col-sm-2 control-label">Balance</label>
                  <div class="col-sm-10">
                    <input type="text" name="balance" class="form-control" id="balance" placeholder="Balance">
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