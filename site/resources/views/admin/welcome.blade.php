<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('title')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{url('css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    <link href="{{url('css/slick.css')}}" rel="stylesheet">
    <link href="{{url('css/slick-theme.css')}}" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Bitter|Roboto+Slab" rel="stylesheet">

    <body style="background-color:#1d0269">

<div class="row justify-content-center p-0 m-0">
<div class="col-md-12 mt-5 text-center">
<img src="{{asset('./img/logo.png')}}" class="img img-fluide  animated pulse infinite" style="width:400px">
<h1 class="hed white-text mt-2">Al-Rizwan NEET Application Admin</h1>
<a class="btn btn-lg btn-outline-white mt-2" href="{{route('admin.login')}}"><i class="fa fa-sign-in"></i>&nbsp;Login</a>

</div>
</div>
</body>

   
</head>

    

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript" src="{{url('js/slick.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{url('js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{url('js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{url('js/mdb.min.js')}}"></script>
    </body>
</html>