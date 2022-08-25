<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Bill History</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
		  <div class="col-md-12" style="height: 700px;overflow-y: scroll;">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Stock Out For <?php echo e(@App\Customer::where('id',$id)->value('name')); ?></h3>

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
                <tr>
                  <th>Date</th> 
                  <th>Type</th>
                  <th>Quantity</th>
                  <th>Amount</th>
                  <th>Payment</th>
                  <th>Payment Balance</th>
                  <th>Deposit Tray</th>
                  <th>Balance Tray</th>
                  <th>Action</th>   
                </tr>
                <?php
                $a=0;
                $p=0;
                $b=0;
                $e=0;
                $bt=0;
                 ?>
                <?php $__currentLoopData = @$stock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($row->date); ?></td>
                  <td><?php if($row->bill_type=='R'): ?> Reciept <?php else: ?> Primary Bill <?php endif; ?> </td>
                  <td><?php echo e($row->quantity); ?></td>
                  <td><?php echo e($row->amount); ?></td>
                  <td><?php echo e($row->payment); ?></td>
                  <td><?php echo e($row->payment_balance); ?></td>
                  <td><?php echo e($row->deposit_t); ?></td>
                  <td><?php echo e($row->balance_t); ?></td>
                  <?php
                    $a +=$row->amount;
                    $p +=$row->payment;
                    $b +=$row->amount-$row->payment;
                    $e +=$row->deposit_t;
                    $bt +=$row->balance_t-$row->deposit_t;
                    

                  ?>
                  <td>  <?php if($row->bill_type=='R'): ?>
                   <a href="<?php echo e(route('print_rec',$row->id)); ?>" target="_blank"><span class="label label-danger"><i class="fa fa-eye"></i>&ensp;Print reciept</span></a>
                  <?php else: ?>
                    <a href="<?php echo e(route('print_bill',$row->id)); ?>" target="_blank"><span class="label label-warning"><i class="fa fa-eye"></i>&ensp;Print Bill</span></a>
                  <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th><i class="fa fa-rupee"></i><?php echo e($a); ?></th>
                  <th> <i class="fa fa-rupee"></i><?php echo e($p); ?></th>
                  <th><i class="fa fa-rupee"></i><?php echo e($b); ?></th>
                  <th><?php echo e($e); ?> </th>
                  <th><?php echo e($bt); ?></th>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      
      </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>