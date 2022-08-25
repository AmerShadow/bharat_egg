<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Make Bill</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12">
  <?php echo $__env->make('partials.alert', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <form action="<?php echo e(route('search_c',$id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="row">
      <div class="col-md-5">
        <div class="form-group">
               <label for="date" class="col-sm-2 control-label">From Date:</label>
                <div class="col-sm-10">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="date_from" class="form-control pull-right" id="datepicker">
                </div>
            </div>
                <!-- /.input group -->
              </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
               <label for="date" class="col-sm-2 control-label">To Date:</label>
                <div class="col-sm-10">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="date_to" class="form-control pull-right" id="datepicker">
                </div>
            </div>
                <!-- /.input group -->
              </div>
      </div>
      <div class="col-md-2">
        <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
        </div>
      </div>
    </div>
  </form>
</div>
    <div class="row">
		  <div class="col-md-8" style="height: 700px;overflow-y: scroll;">
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
                  <td>  <?php if($row->bill_type=='R'): ?>
                   <a href="<?php echo e(route('print_rec',$row->id)); ?>" target="_blank"><span class="label label-danger"><i class="fa fa-eye"></i>&ensp;Print reciept</span></a>
                  <?php else: ?>
                    <a href="<?php echo e(route('print_bill',$row->id)); ?>" target="_blank"><span class="label label-warning"><i class="fa fa-eye"></i>&ensp;Print Bill</span></a>
                  <?php endif; ?>
                  </td>
                </tr>
                <?php
                    $a +=$row->amount;
                    $p +=$row->payment;
                    $b +=$row->amount-$row->payment;
                    $e +=$row->deposit_t;
                    $bt +=$row->balance_t-$row->deposit_t;


                  ?>
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
      	<div class="col-md-4">
           <div class="box box-info">

            <div class="box-header with-border">

              <h3 class="box-title">Stock Out : Bil number <?php echo e($billNumer->number ?? 0); ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo e(route('stock_out',$id)); ?>" method="POST">
              <?php echo csrf_field(); ?>

              <div class="box-body">
                <div class="form-group">
                  <label for="cust_id" class="col-sm-2 control-label">Custmer ID</label>

                  <div class="col-sm-10">
                    <input type="text" name="cust_id" class="form-control" id="cust_id" placeholder="Customer" value="<?php echo e(@App\Customer::where('id',$id)->value('name')); ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="quantity" class="col-sm-2 control-label">Quantity</label>

                  <div class="col-sm-10">
                    <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Quantity">
                  </div>
                </div>
                <div class="form-group">
                  <label for="amount" class="col-sm-2 control-label">Sell Rate</label>
                  <div class="col-sm-10">
                    <input type="number" name="rate" step="0.01" class="form-control" id="rate" placeholder="Sell Rate">
                  </div>
                </div>
                <div class="form-group">
                  <label for="amount" class="col-sm-2 control-label">Purchase Rate</label>
                  <div class="col-sm-10">
                    <input type="number" name="p_rate" step="0.01" class="form-control" id="p_rate" placeholder="Purchase Rate">
                  </div>
                </div>
                <div class="form-group">
                  <label for="amount" class="col-sm-2 control-label">Amount</label>
                  <div class="col-sm-10">
                    <input type="number" name="amount" step="0.01" class="form-control" id="amount" placeholder="Amount">
                  </div>
                </div>
                <div class="form-group">
                  <label for="payment" class="col-sm-2 control-label">Payment</label>

                  <div class="col-sm-10">
                    <input type="number" name="payment" step="0.01" class="form-control" id="payment" placeholder="Payment">
                  </div>
                </div>
                <div class="form-group">
                  <label for="payment balance" class="col-sm-2 control-label">Payment Balance</label>

                  <div class="col-sm-10">
                    <input type="number" name="payment_balance" step="0.01" class="form-control" id="payment_balance" placeholder="Payment Balance">
                  </div>
                </div>
                <div class="form-group">
                  <label for="empty_t" class="col-sm-2 control-label">Deposit Tray</label>

                  <div class="col-sm-10">
                    <input type="text" name="empty_t" class="form-control" id="empty_t" placeholder="Empty Tray">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="balance_t" class="col-sm-2 control-label">Balance Tray</label>

                  <div class="col-sm-10">
                    <input type="text" name="balance_t" class="form-control" id="balance_t" placeholder="Balance Tray">
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
<?php $__env->startSection('js'); ?>
    <script type="text/javascript">
      $(document).ready(function(){




    $("#amount").on('click',function(){
      $("#amount").val($("#quantity").val()*$("#rate").val());
    });

     $("#payment_balance").on('click',function(){
      $("#payment_balance").val($("#quantity").val()*$("#rate").val()-$("#payment").val());
    });

  });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>