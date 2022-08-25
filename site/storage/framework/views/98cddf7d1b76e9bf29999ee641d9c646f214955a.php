<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Catagory</h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-sm-10 ">
  <?php echo $__env->make('partials.alert', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <div class="row">
      <div class="col-xs-12">
        
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">All Catagories</h3>

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
                  <th>Count</th>
                  <th>Quanlity</th>
                  <th>Action</th>
                  
                </tr>
                <?php $__currentLoopData = @$cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($row->name); ?></td>
                  <td><?php echo e($row->count); ?></td>
                  <td><?php echo e($row->quality); ?></td>
                  <td><a href="<?php echo e(route('cate_del',$row->id)); ?>"><span class="label label-danger">Delete</span></td>
                  
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
      </div>
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Catagory</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo e(route('cate_add')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Description</label>

                  <div class="col-sm-10">
                    <input type="text" name="description" class="form-control" id="description" placeholder="Description">
                  </div>
                </div>
                <div class="form-group">
                  <label for="count" class="col-sm-2 control-label">Count</label>

                  <div class="col-sm-10">
                    <input type="text" name="count" class="form-control" id="count" placeholder="Count">
                  </div>
                </div>
                <div class="form-group">
                  <label for="quality" class="col-sm-2 control-label">Quality</label>

                  <div class="col-sm-10">
                    <input type="text" name="quality" class="form-control" id="quality" placeholder="Quality">
                  </div>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>