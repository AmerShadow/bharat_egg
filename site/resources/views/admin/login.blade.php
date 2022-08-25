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
    <div class="row p-0 m-0 justify-content-center">
        <div class="col-lg-12 mt-2 text-center">
            <img src="{{asset('./img/logo.png')}}" style="width:200px">
            <h1 class="hed white-text ">Al-Rizwan NEET Practice Application</h1>
        </div>

        <div class="col-md-4 z-depth-2 border border-light p-5 mt-3">

            <h2 class="hed text-center white-text mb-5">Admin Login</h2>
            <form  method="POST" action="{{ route('admin.login') }}">
            {{ csrf_field() }}
       
            <input class="form-control mb-4" type="text" placeholder="Email" name="email" autofocus required>
            @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
            <input class="form-control mb-4" type="password" placeholder="password" name="password" required>
            @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
            <div class="text-center">
            <button class="btn btn-lg btn-outline-white mb-4" type="submit"><i class="fa fa-sign-in"></i>&nbsp;Login</button>
            </div>
            </form>
        </div>
</div>

   
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



