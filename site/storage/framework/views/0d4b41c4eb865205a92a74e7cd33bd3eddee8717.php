<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title>Alrizwan NEET Application Admin</title>

    <!-- Styles -->
    <link href="<?php echo e(url('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
<!--     <link href="<?php echo e(url('css/datepicker.css')); ?>" rel="stylesheet" type="text/css">
 -->    <link href="<?php echo e(url('css/mdb.min.css')); ?>" rel="stylesheet" type="text/css">
<!--     <link href="<?php echo e(url('css/main.css')); ?>" rel="stylesheet" type="text/css">
 -->    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/components/icon.min.css'>
    <link href="<?php echo e(url('css/select.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(url('css/transition.css')); ?>" rel="stylesheet" type="text/css">
    <!-- <link href="<?php echo e(url('css/dropdown.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(url('css/imageviewer.css')); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('css/owl.carousel.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('css/owl.theme.css')); ?>"> -->
    <link href="<?php echo e(url('https://fonts.googleapis.com/css?family=Montserrat:400,700|Roboto:400,400italic,500,500italic,700,700italic,300italic,300')); ?>" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed|Courgette|Dancing+Script|Leckerli+One|Roboto+Slab|Roboto|Noto+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="<?php echo e(url('css/select.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(url('css/style.css')); ?>" rel="stylesheet" type="text/css">
    
</head>
<body >

<!-- <nav class="navbar navbar-dark ">
<div class="col-md-12 text-center p-0 m-0">
<a class="navbar-brand " href="#" style="font-family: 'Courgette', cursive;font-size:xx-large;color: #0d47a1;">
   <img src="<?php echo e(asset('images/logo.png')); ?>" width="80px" height="80px"/>
    
</a>
</div>
 <ul class="navbar-nav ml-auto ">
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light serif" style="color: #0d47a1;">
                                <i class="fa fa-phone " aria-hidden="true" ></i>&ensp;+91 8605261129
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light serif" style="color: #0d47a1;">
                                <i class="fa fa-envelope " aria-hidden="true"></i>&ensp;example@ip.com
                            </a>
                        </li>
                        
                        
                    </ul>
</nav> -->
<nav class="navbar navbar-expand-lg navbar-dark   m-0 navbar-scrollable" style="background-color:#1d0269;">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-3" aria-controls="navbarSupportedContent-3" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-3">
                    <ul class="navbar-nav m-auto">
                    <img class="" src="<?php echo e(asset('img/logo.png')); ?>" width="100px" height="80px">
                        <li class="nav-item ">
                            <a class="nav-link waves-effect waves-light serif" href="<?php echo e(route('admin.home')); ?>">
                            <h3 class="mt-3">ALRIZWAN NEET APPLICATION</h3>
                          </a>
                        </li>
                        
                      
                    </ul>
                 
                </div>
            </nav>
<div class="row m-0 p-0">
    <div class="col-md-2 m-0 card pt-3 " style="border-radius: 0px;background-color:#1d0269;">
    
        <ul class="list-unstyled">
            <li class="nav-item " >
                            <a class="nav-link waves-effect waves-light serif white-text" style="width: 100%" href="<?php echo e(route('admin.home')); ?>">
                                <i class="fa fa-tachometer"></i> &ensp;Dashboard
                            </a>
        </li>
        <li class="nav-item " >
                            <a class="nav-link waves-effect waves-light serif white-text" style="width: 100%" href="<?php echo e(route('admin.paper')); ?>">
                                <i class="fa fa-file"></i> &ensp;Question Papers
                            </a>
        </li>
        <li class="nav-item " >
                            <a class="nav-link waves-effect waves-light serif white-text" style="width: 100%" href="<?php echo e(route('admin.subject')); ?>">
                                <i class="fa fa-file"></i> &ensp;Add Subject
                            </a>
        </li>
        </ul>
    </div>
    <div class="col-md-10 m-0  pl-0 pr-0 rgba-grey-light">
        <!-- <div class="col-lg-12 text-right"><a class="btn btn-md btn-outline-secondary" href="<?php echo e(route('logout')); ?>">Logout</a></div> -->
        <!--<div class="card p-2 serif" style="border-bottom:1px solid #263238;border-radius: 0px;">-->
        <!--  <strong><?php echo e(url()->current()); ?></strong>-->
        <!--</div>-->
    <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>

<!-- Script -->


<!--Footer-->

    
    <!--/.Footer Links-->

    <!--Copyright-->
<section>
     <div class="footer-copyright py-2 text-center elegant-color-dark white-text serif ">
        © 2018 Copyright:
        <a href="https://nagstud.com" class="white-text"> Nagstud.com  </a>
    </div>
</section>
   
    <!--/.Copyright-->


<!--/.Footer-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo e(url('js/jquery-3.3.1.min.js')); ?>"></script>

<script src="<?php echo e(url('js/popper.min.js')); ?>"></script>
<script src="<?php echo e(url('js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(url('js/mdb.min.js')); ?>"></script>
<!-- <script src="<?php echo e(url('js/bootstrap-multiselect.js')); ?>"></script> -->
<!-- <script src="<?php echo e(url('js/owl.carousel.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/slider.js')); ?>"></script> -->
<!-- <script src="<?php echo e(url('js/select.js')); ?>"></script> -->
<!-- <script src="<?php echo e(url('js/bootstrap-datepicker.js')); ?>"></script> -->
<!-- <script src="<?php echo e(url('js/transition.js')); ?>"></script> -->
<!-- <script src="<?php echo e(url('js/dropdown.min.js')); ?>"></script>
<script src="<?php echo e(url('js/imageviewer.min.js')); ?>"></script>

 -->
<script type="text/javascript" src="<?php echo e(url('js/tinymce/js/tinymce/tinymce.min.js')); ?>"></script>
<script src="<?php echo e(url('js/tinymce/js/tinymce/plugins/tiny_mce_wiris/integration/WIRISplugins.js?viewer=image')); ?>" ></script>
</body>
</html>