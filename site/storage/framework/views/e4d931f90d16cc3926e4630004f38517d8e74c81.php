<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Make bill Or Credit</h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-md-4">
			  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Item To Bill DHF000<?php echo e($billnum); ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo e(route('sell')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <?php echo e($errors); ?>

              <input type="text" name="bill_num" style="display: none;" value="<?php echo e($billnum); ?>">
              <div class="box-body">
                 <div class="form-group">
                <label class="col-sm-2 control-label" >Customer</label>
                <div class="col-sm-10">
                <select name="cust_id" class="form-control select2" style="width: 100%;" >
                  <?php $__currentLoopData = @$customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($row->id); ?>" <?php if(@$cust_id==$row->id): ?> Selected <?php endif; ?>><?php echo e($row->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
              </div>
                 <div class="form-group">
                <label class="col-sm-2 control-label">Item</label>
                <div class="col-sm-10">
                <select name="inv_id" class="form-control select2" style="width: 100%;" id="inv_id">
                 
                  
                 <?php $__currentLoopData = $stock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($row->inv_id); ?>"><?php echo e(@App\Inventory::where('id',$row->inv_id)->value('fruit_name')); ?>---<?php echo e(@App\Category::where('id',$row->cat_id)->value('name')); ?><?php echo e(@App\Category::where('id',$row->cat_id)->value('count')); ?><?php echo e(@App\Category::where('id',$row->cat_id)->value('quality')); ?></option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
              </div>
                <div class="form-group">
                  <label for="quantity" class="col-sm-2 control-label">Quantity</label>

                  <div class="col-sm-10">
                    <input type="number" name="quantity" class="form-control" id="quantity" placeholder="quantity">
                  </div>
                </div>
                <div class="form-group">
                  <label for="discount" class="col-sm-2 control-label">Price/Item</label>

                  <div class="col-sm-10">
                    <input type="number" name="p_price" class="form-control" id="pp" placeholder="Price/Item">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="discount" class="col-sm-2 control-label">Discount</label>

                  <div class="col-sm-10">
                    <input type="number" name="discount" class="form-control" id="discount" placeholder="Discount">
                  </div>
                </div>
                <div class="form-group">
                  <label for="discount" class="col-sm-2 control-label">Credit</label>

                  <div class="col-sm-10">
                    <input type="number" name="credit" class="form-control" id="credit" placeholder="credit">
                  </div>
                </div>
                <div class="form-group">
                  <label for="discount" class="col-sm-2 control-label">Debit</label>

                  <div class="col-sm-10">
                    <input type="number" name="debit" class="form-control" id="debit" placeholder="Debit">
                  </div>
                </div>
                <div class="form-group">
                  <label for="discount" class="col-sm-2 control-label">Balance</label>

                  <div class="col-sm-10">
                    <input type="number" name="balance" class="form-control" id="balance" placeholder="Balance">
                  </div>
                </div>
                <!--<div class="form-group">
                  <label for="amount" class="col-sm-2 control-label">Amount</label>

                  <div class="col-sm-10">
                    <input type="text" name="amount" class="form-control" id="amount" placeholder="Amount">
                  </div>
                </div>
                <div class="form-group">
                  <label for="total" class="col-sm-2 control-label">Total</label>

                  <div class="col-sm-10">
                    <input type="text" name="total" class="form-control" id="total" placeholder="Total">
                  </div>
                </div>
                <div class="form-group">
                  <label for="pay_type" class="col-sm-2 control-label">Payment Type</label>

                  <div class="col-sm-10">
                    <input type="text" name="pay_type" class="form-control" id="pay_type" placeholder="Payment Type">
                  </div>
                </div> -->
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               
                <button type="submit" class="btn btn-info pull-right">ADD</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
		</div>
		<div class="col-sm-8">
    <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Bill DHF000<?php echo e($billnum); ?></h3>

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
                  <th>Discount</th>
                  <th>Balance</th>
                </tr>
                <?php $__currentLoopData = @App\Sale::where('bill_num',$billnum)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($row->created_at); ?></td>
                  <td>DHF000<?php echo e($billnum); ?></td>
                  <td><?php echo e(@App\Inventory::where('id',$row->inv_id)->value('fruit_name')); ?>---<?php echo e(@App\Category::where('id',@App\Inventory::where('id',$row->inv_id)->value('cate_id'))->value('name')); ?>.<?php echo e(@App\Category::where('id',@App\Inventory::where('id',$row->inv_id)->value('cate_id'))->value('count')); ?>.<?php echo e(@App\Category::where('id',@App\Inventory::where('id',$row->inv_id)->value('cate_id'))->value('quality')); ?></td>
                  
                  
                  <td><?php echo e($row->quantity); ?></td>
                  <td><?php echo e($row->credit); ?></td>
                  <td><?php echo e($row->debit); ?></td>
                  <td><?php echo e($row->discount); ?>%</td>
                  <td><?php echo e($row->balance); ?></td>
                  <td><a href="<?php echo e(route('sale_del',$row->id)); ?>"><span class="label label-danger">Delete</span></a></td>
                  
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </table>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr style="background-color: red;color: white">
                  <th></th>
                  <th></th>
                 
                  <th>Total </th>
                  <?php $total=0;
                    $total_d=0;
                    $total_b=0;
                  ?>
                  <?php $__currentLoopData = @App\Sale::where('bill_num',$billnum)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
          
                    <?php  $total +=$row->credit;
                      $total_d +=$row->debit;
                      $total_b +=$row->balance;

                    ?>
                    
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  <th>Credit:<?php echo e($total); ?></th>
                  <th>Debit:<?php echo e($total_d); ?></th>
                  <th>Balance:<?php echo e($total_b); ?></th>

  
                </tr>
            </table>
          </div>
          <div class="col-sm-12 text-right">
            <a href="<?php echo e(route('c_bill',$billnum)); ?>" target="_blank"><span class="label label-success">Generate bill</span></a> 
          </div>
    </div>			
	</div>
  <div class="col-sm-12">
      <div class="box box-danger">
            <div class="box-header">  
               <h1 class="text-center "><img src="<?php echo e(asset('svg/logo.svg')); ?>" style="width: 100px;height: 100px" ></h1>
            <h3 class="text-center " style="color: red;margin-top: 0px;" >LEAGDER (Sale)</h3>         
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
              <table class="table table-hover table-fixed">
                <thead style="background-color: red;color: white">
                  <tr >
                  <th>Date</th>
                  <th>Reciept_no</th>
                  <th>Perticulars</th>
                  <th>Quantity</th>
                  <th>Credit</th>
                  <th> Debit</th>
                  <th>Balance</th>
                  <th>Action</th>
                  
                  
                </tr>
                </thead>
                <tbody style="height:200px;overflow-y:auto;width: 100%;">
                  <?php
                $total=0;
                  $credit=0;
                  $debit=0;
                ?>
               
                <?php $__currentLoopData = @$inv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($row->created_at); ?></td>
                <td>DHF000<?php echo e($row->bill_num); ?></td>
                
                <td><?php echo e(App\Inventory::where('id',$row->inv_id)->value('fruit_name')); ?></td>
                <td><?php echo e($row->quantity); ?></td>
                <td><?php echo e($row->debit); ?></td>
                <td><?php echo e($row->credit); ?></td>
                
                <td><?php echo e($row->balance); ?></td>
                <td><form method="POST" action="<?php echo e(route('update_bill',[$row->id,$row->bill_num])); ?>">
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
                </tbody>
                
                
        <tr style="background-color: red;color: white">
           <th></th>
                  <th></th>
                  <th></th>
                  <th>Total</th>
                  <th><i class="fa fa-rupee"></i><?php echo e($debit); ?></th>
                  <th><i class="fa fa-rupee"></i><?php echo e($credit); ?> </th>
                  <th><i class="fa fa-rupee"></i><?php echo e($total); ?></th>
                  <th></th>
        </tr>
              </table>
            </div>
             
           
          </div>
  </div>
</div>





<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<style type="text/css">
  
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#discount').on('change',function(e){
    			var disc_am=$('#quantity').val()*$('#pp').val()*($('#discount').val()/100)
    			$('#credit').val(($('#quantity').val()*$('#pp').val())-disc_am);
    		});
    		$('#debit').on('change',function(e){
    			
    			$('#balance').val($('#credit').val()-$('#debit').val());
    		});
    		});
    	

 
    $("#inv_id").select2({
                 
                });
    
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>