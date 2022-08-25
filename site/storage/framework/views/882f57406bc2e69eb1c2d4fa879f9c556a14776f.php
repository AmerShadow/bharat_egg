<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Stock Management</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
		  <div class="col-xs-12" style="height: 700px;overflow-y: scroll;">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Receipt</h3>

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
                  <th>Customer ID</th>
                  <th>Bill No</th>
                  <th>Amount</th>
                  <th>Amount Paid</th>
                  <th>Balance</th>
                  <th>Date</th>    
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      	
      </div>
     <div class="box box-info">
     	
            <div class="box-header with-border">

              <h3 class="box-title">Payment Receive</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo e(route('stock_out')); ?>" method="POST">
              <?php echo csrf_field(); ?>
             
              <div class="box-body">
                <div class="form-group">
                  <label for="cust_id" class="col-sm-2 control-label">Custmer ID</label>

                  <div class="col-sm-10">
                    <input type="text" name="cust_id" class="form-control" id="cust_id" placeholder="cust_id">
                  </div>
                </div>
              </div>
                <div class="form-group">
                  <label for="bill_no" class="col-sm-2 control-label">Bill No</label>

                  <div class="col-sm-10">
                    <input type="text" name="bill_no" class="form-control" id="bill_no" placeholder="Bill No">
                  </div>
                </div>
                <div class="form-group">
                  <label for="amount" class="col-sm-2 control-label">Amount</label>
                  <div class="col-sm-10">
                    <input type="text" name="amount" class="form-control" id="amount" placeholder="Amount">
                  </div>
                </div>
                <div class="form-group">
                  <label for="amount_paid" class="col-sm-2 control-label">Amount Paid</label>

                  <div class="col-sm-10">
                    <input type="text" name="amount_paid" class="form-control" id="amount_paid" placeholder="Amount Paid">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>