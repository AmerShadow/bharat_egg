<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php echo $__env->yieldContent('title'); ?>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(url('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo e(url('css/mdb.min.css')); ?>" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <link href="<?php echo e(url('css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('css/slick.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('css/slick-theme.css')); ?>" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Bitter|Roboto+Slab" rel="stylesheet">

    

   
</head>

    <body>
<div class="col-md-12 text-center">
  <img src="<?php echo e(asset('./img/logo.png')); ?>" class="img img-fluide " style="width:100px"><br>
  <h4 class="h4"><?php echo e(@App\Test::where('id',$test_id)->value('title')); ?></h4>

</div>
<div class="row justify-content-center p-0 m-0">
   
 
           <?php echo $__env->yieldContent('content'); ?>
   
    </div>  
        
    <!-- SCRIPTS -->
    <!-- JQuery -->

    

 

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript" src="<?php echo e(url('js/slick.min.js')); ?>"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo e(url('js/popper.min.js')); ?>"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo e(url('js/bootstrap.min.js')); ?>"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo e(url('js/mdb.min.js')); ?>"></script>
    </body>
</html>
