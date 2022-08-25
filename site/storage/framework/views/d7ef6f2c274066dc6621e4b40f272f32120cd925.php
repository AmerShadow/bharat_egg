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
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#1d0269;">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="basicExampleNav">
     <a class="navbar-brand hed" href="#"><!-- <img src="<?php echo e(asset('img/logo.png')); ?>" style="width:90px"> --></a>
        <ul class="navbar-nav mr-auto hedr">
            <li class="nav-item active">
                <a class="nav-link hed" href="#">Home
                 <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
             <a class="nav-link hed" href="#">My Test</a>
            </li>
            
            
       </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
             <a class="btn btn-md btn-outline-white nav-link hed-r" href="<?php echo e(url('/logout')); ?>"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
             </li>
             <li class="nav-item">
             <a class="btn btn-md btn-outline-white nav-link hed-r" href="#">Start test</a>
             </li>
        </ul>
        </div>
        </nav>
<div class="row justify-content-center p-0 m-0">
   
    <div class="col-md-9">
           <?php echo $__env->yieldContent('content'); ?>
    </div>  
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
