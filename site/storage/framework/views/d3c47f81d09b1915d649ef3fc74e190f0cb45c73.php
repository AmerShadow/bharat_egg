<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Balance Sheet</h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-md-12">
  <form action="<?php echo e(route('search_bs')); ?>" method="POST">
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
<div class="col-md-12" style="height: 700px;overflow-y: scroll;">
	<div class="box box-danger col-md-12">
            <div class="box-header">

            <h3 class="text-center " style="color: red;margin-top: 0px;" >Balance Sheet</h3>
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
          <div class="row">
            <div class="box-body table-responsive no-padding col-md-3">
              <table class="table table-hover">
                <tr style="background-color: red;color: white">
                  <th>Date</th>


                  <th>Purchase</th>


                </tr>
                <?php
                  $purchase_t=0;
                  $sold_t=0;
                  $dep=0;

                ?>
                <?php $__currentLoopData = @$purchase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($key); ?></td>
                  <td><?php echo e($row); ?></td>
                </tr>
                <?php

                  $purchase_t +=$row;
                ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr style="background-color: red;color: white">
                  <td>Total Purchase</td>
                  <td><i class="fa fa-rupee"></i> <?php echo e($purchase_t); ?></td>
                </tr>
              </table>
            </div>

            <div class="box-body table-responsive no-padding col-md-3">
              <table class="table table-hover">
                <tr style="background-color: red;color: white">
                  <th>Date</th>


                  <th>Sold</th>




                </tr>
                <?php $__currentLoopData = @$sold; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($key); ?></td>
                  <td><?php echo e($row); ?></td>
                 <?php

                  $sold_t +=$row;
                ?>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <tr style="background-color: red;color: white">
                  <td>Total Sold</td>
                  <td><i class="fa fa-rupee"></i> <?php echo e($sold_t); ?></td>
                </tr>

              </table>
            </div>

            <div class="box-body table-responsive no-padding col-md-3">
              <table class="table table-hover">
                <tr style="background-color: red;color: white">
                  <th>Date</th>


                  <th>Deposit</th>




                </tr>
                <?php $__currentLoopData = @$deposit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($key); ?></td>
                  <td><?php echo e($row); ?></td>

              <?php
                $dep += $row;
              ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <tr style="background-color: red;color: white">
                  <td>Total Deposit</td>
                  <td><i class="fa fa-rupee"></i> <?php echo e($dep); ?></td>
                </tr>

              </table>
            </div>

            <div class="box-body table-responsive no-padding col-md-3">
              <table class="table table-hover">
                <tr style="background-color: red;color: white">
                  <th>Expenses</th>
                   <th></th>
                </tr>
                <tr >
                 <td>Vehical Expense</td>
                  <td><?php echo e($sumVahicleExpences); ?></td>
                </tr>
                <tr>
                 <td>Labour Expense</td>
                      <td><?php echo e($sumLabourExpences); ?></td>
                </tr>
                <tr>
                 <td>Other Expense</td>
                   <td><?php echo e($sumExtraExpences); ?></td>
                </tr>
                <tr  style="background-color: red;color: white">
                 <td>Total Expense</td>
                   <td><i class="fa fa-rupee"></i> <?php echo e($sumVahicleExpences + $sumLabourExpences + $sumExtraExpences); ?></td>
                </tr>

              <tr  style="background-color: red;color: white">
                 <td>Total balance</td>
                   <td><i class="fa fa-rupee"></i> <?php echo e($sold_t-$dep); ?></td>
                </tr>


              </table>
            </div>


          </div>


          </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>