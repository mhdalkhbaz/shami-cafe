<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Branchs requests </title>
    <link rel="icon" href="{{url('/assets')}}/img/the-coffee1.jpg" type="image/icon type">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{url('/assets')}}/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!--external css-->
    <link href="{{url('/assets')}}/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{url('/assets')}}/lib/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css"
        href="{{url('/assets')}}/lib/bootstrap-daterangepicker/daterangepicker.css" />
    <!-- Custom styles for this template -->
    <link href="{{url('/assets')}}/css/style.css" rel="stylesheet">

    <link href="{{url('/assets')}}/css/style-responsive.css" rel="stylesheet">


    <style>
        .wid {
            width: 50px
        }

        body {
            height: 1400px;
            direction: rtl
        }

        .numeric {
            text-align: center
        }

        .border-none {
            border: none;
            background: #ff000000;
            width: 50px;
            text-align: center;


        }

        .branch {

            border: none;

        }

        .branch2 {
            border: none;
            width: 120px;
            float: right;
        }

        .w-100 {
            width: 100%;
        }

        .center {
            text-align: center;
        }

        li a {
            font-size: 20px;
        }
        
      .w-100{
        width: 100%;
      }

    </style>



</head>

<body class="w-100">


  
    <nav class="navbar navbar-default" style=" margin: 0 20px 10px 20px ;">
        <div class="container-fluid">

       
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      
    </div>


            <div class="collapse navbar-collapse"  id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                            aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class=" nav-item dropdown">
                                <a class="dropdown-item" href="{{ url('/login/logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                </ul>

                <ul class="nav navbar-nav">
                  <li class="nav-item navbar-right  "> <a href="{{route('based')}}">  الشوكولا</a> </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li class="nav-item navbar-right  "> <a href="{{route('orders')}}">طلبات المواد  </a> </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li class="nav-item navbar-right  "> <a href="{{route('reqs')}}">تسجيل طلب شراء  </a> </li>
                </ul>
                @endguest

                </ul>
            </div>

    </nav>

 

    @yield('content')



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{url('/assets')}}/lib/jquery/jquery.min.js"></script>
    <script src="{{url('/assets')}}/lib/bootstrap/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="{{url('/assets')}}/lib/jquery.dcjqaccordion.2.7.js"></script>
    <script src="{{url('/assets')}}/lib/jquery.scrollTo.min.js"></script>
    <script src="{{url('/assets')}}/lib/jquery.nicescroll.js" type="text/javascript"></script>
    <!--common script for all pages-->
    <script src="{{url('/assets')}}/lib/common-scripts.js"></script>
    <!--script for this page-->
    <script src="{{url('/assets')}}/lib/jquery-ui-1.9.2.custom.min.js"></script>
    <!--custom switch-->
    <script src="{{url('/assets')}}/lib/bootstrap-switch.js"></script>
    <!--custom tagsinput-->
    <script src="{{url('/assets')}}/lib/jquery.tagsinput.js"></script>
    <!--custom checkbox & radio-->
    <script type="text/javascript" src="{{url('/assets')}}/lib/bootstrap-datepicker/js/bootstrap-datepicker.js">
    </script>
    <script type="text/javascript" src="{{url('/assets')}}/lib/bootstrap-daterangepicker/date.js"></script>
    <script type="text/javascript" src="{{url('/assets')}}/lib/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="{{url('/assets')}}/lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    <script src="{{url('/assets')}}/lib/form-component.js"></script>




 


</body>

</html>
