<?php $__env->startSection('title', 'Bharat Egg'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Dashboard</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
         <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">

              <h3>
              	<?php echo e(@App\AvbStock::sum('quantity')); ?> </h3>

              <p>Stock Available</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><i class="fa fa-rupee"></i>
              	<?php echo e(@App\StockOut::whereDay('date', date('d'))->sum('amount')); ?> </h3>

              <p>Stock Sold <?php echo e(@App\StockOut::whereDay('date', date('d'))->sum('quantity')); ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo e(route('sale_det')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><i class="fa fa-rupee"></i>
              	<?php echo e(App\StockOut::whereDay('date', date('d'))->sum('payment_balance')); ?> </h3>

              <p>Balance </p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo e(route('balance-sheet')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
             <h3><i class="fa fa-rupee"></i>
              	<?php echo e(@App\StockOut::whereDay('date', date('d'))->value('payment')); ?> </h3>

              <p>Deposite  </p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>

          </div>
        </div>
      </div>
	<div class="col-sm-12 text-right " style="margin-bottom: 2rem">

      		<a href="<?php echo e(route('sale_det')); ?>"><span class="label label-success"><i class="fa fa-eye"></i>&ensp;Sale Ledger</span></a>

          <a href="<?php echo e(route('balance-sheet')); ?>"><span class="label label-info"><i class="fa fa-eye"></i>&ensp;Balance Sheet</span></a>


      	</div>
      <div class="row">
      	<div class="col-md-6">
      		   <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create New Customer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo e(route('cust_add')); ?>" method="POST">
              <?php echo csrf_field(); ?>

              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="mobileno" class="col-sm-2 control-label">Mobileno</label>

                  <div class="col-sm-10">
                    <input type="text" name="mobileno" class="form-control" id="mobileno" placeholder="Mobileno">
                  </div>
                </div>
                <div class="form-group">
                  <label for="address" class="col-sm-2 control-label">Address</label>

                  <div class="col-sm-10">
                    <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                  </div>
                </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Create</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
      	</div>
      	<div class="col-md-6" style="height: 250px;overflow-y: scroll;">
      		<div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">All Customers</h3>

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

                  <th>Name</th>
         			<th>Mobile</th>
              <th>balance</th>
              <th>Tray</th>
                  <th>Action</th>
                </tr>
                <?php $__currentLoopData = @$cust; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <tr>

                  <td><?php echo e($row->name); ?></td>
                  <td><?php echo e($row->mobile_no); ?></td>
                  <td><i class="fa fa-rupee"></i><?php echo e(@App\StockOut::where('cust_id',$row->id)->sum('amount')-@App\StockOut::where('cust_id',$row->id)->sum('payment')); ?></td>
                  <td><i class="fa fa-shopping-cart"></i><?php echo e(@App\StockOut::where('cust_id',$row->id)->sum('balance_t')-@App\StockOut::where('cust_id',$row->id)->sum('deposit_t')); ?></td>
                  <td> <a href="<?php echo e(route('cust_del',$row->id)); ?>"><span class="label label-danger">Delete</span></a>
                  	<a href="<?php echo e(route('make_bill',$row->id)); ?>"><span class="label label-warning"><i class="fa fa-eye"></i>&ensp; Bill</span></a></td>


                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


              </table>
            </div>
            <!-- /.box-body -->
          </div>
      	</div>


            <div class="col-md-6">
           <div class="box box-info">

            <div class="box-header with-border">
                <?php $recNumber = @App\RecNumber::first(); ?>
              <h3 class="box-title">Stock Reciept : Recipt number <?php echo e($recNumber->number ?? 0); ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo e(route('rec')); ?>" method="POST">
              <?php echo csrf_field(); ?>

              <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label" >Customer</label>
                <div class="col-sm-10">
                  <select name="cust_id" class="form-control select2" style="width: 100%;" >
                    <?php $__currentLoopData = @$cust; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($row->id); ?>" ><?php echo e($row->name); ?>----Rs:<?php echo e(@App\StockOut::where('cust_id',$row->id)->sum('amount')-@App\StockOut::where('cust_id',$row->id)->sum('payment')); ?>

                        Tray<?php echo e(@App\StockOut::where('cust_id',$row->id)->sum('balance_t')-@App\StockOut::where('cust_id',$row->id)->sum('deposit_t')); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>


                <div class="form-group">
                  <label for="payment" class="col-sm-2 control-label">Payment</label>

                  <div class="col-sm-10">
                    <input type="number" name="payment" class="form-control" id="payment" placeholder="Payment">
                  </div>
                </div>

                <div class="form-group">
                  <label for="empty_t" class="col-sm-2 control-label">deposit Tray</label>

                  <div class="col-sm-10">
                    <input type="text" name="empty_t" class="form-control" id="empty_t" placeholder="Empty Tray">
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



      	<div class="col-md-6">
      		   <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create New Seller</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo e(route('seller_add')); ?>" method="POST">
              <?php echo csrf_field(); ?>

              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="mobileno" class="col-sm-2 control-label">Mobileno</label>

                  <div class="col-sm-10">
                    <input type="text" name="mobileno" class="form-control" id="mobileno" placeholder="Mobileno">
                  </div>
                </div>
                <div class="form-group">
                  <label for="address" class="col-sm-2 control-label">Address</label>

                  <div class="col-sm-10">
                    <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                  </div>
                </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Create</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
      	</div>
      	<div class="col-md-6" style="height: 250px;overflow-y: scroll;">
      		<div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">All Seller</h3>

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

                  <th>Name</th>
         			<th>Mobile</th>
                  <th>Action</th>
                </tr>
                <?php $__currentLoopData = @$seller; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <tr>

                  <td><?php echo e($row->name); ?></td>
                  <td><?php echo e($row->mobile); ?></td>
                  <td> <a href=""><span class="label label-danger">Delete</span></a>
                    <a href="<?php echo e(route('stock_show',$row->id)); ?>"><span class="label label-primary"><i class="fa fa-eye"></i>&ensp;Ledger</span></a></td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


              </table>
            </div>
            <!-- /.box-body -->
          </div>
      	</div>




        <div class="col-xs-6">
      		   <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Add Damage Stock</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo e(route('add_damaged')); ?>" method="POST">
              <?php echo csrf_field(); ?>


                <div class="form-group">
                  <label for="mobileno" class="col-sm-2 control-label">Qunatity</label>

                  <div class="col-sm-10">
                    <input type="text" name="quantity" class="form-control" id="mobileno" placeholder="Qunatity">
                  </div>
                </div>
                <div class="form-group">
                  <label for="mobileno" class="col-sm-2 control-label">Rate</label>

                  <div class="col-sm-10">
                    <input type="text" name="rate" class="form-control" id="mobileno" placeholder="Qunatity">
                  </div>
                </div>
                <div class="form-group">
                  <label for="mobileno" class="col-sm-2 control-label">Date</label>

                  <div class="col-sm-10">
                    <input type="date" name="date" class="form-control" id="mobileno" placeholder="Qunatity">
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
      <script type="text/javascript" src="<?php echo e(url('js/jquery.min.js')); ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#inv_id").select2({

                });
		$("#cat_id").select2({

                });
	});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>