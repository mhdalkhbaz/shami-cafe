


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <link rel="icon" href="{{url('/assets')}}/img/the-coffee1.jpg" type="image/icon type">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Bootstrap core CSS -->
  <link href="{{url('/assets')}}/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="{{url('/assets')}}/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{url('/assets')}}/css/style-cho.css" rel="stylesheet">

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
 



</head>

<body >
<!-- 
  <style>
    .pageloader {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url('{{url('/')}}/assets/img/icon.png') 50% 50% no-repeat white ;
      /* opacity: .5; */
    }
   </style>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <div class="pageloader"></div>
    <script>
        $(window).load(function() {
      $(".pageloader").fadeOut(1000);
      });  
    </script> -->

@yield('content')



  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{url('/assets')}}/lib/jquery/jquery.min.js"></script>
  <script src="{{url('/assets')}}/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="{{url('/assets')}}/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="{{url('/assets')}}/lib/jquery.scrollTo.min.js"></script>
  <script src="{{url('/assets')}}/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <!-- <script src="{{url('/assets')}}/lib/common-scripts.js"></script> -->
  <!--script for this page-->
  <script src="{{url('/assets')}}/lib/jquery-ui-1.9.2.custom.min.js"></script>
  <!--custom switch-->
  <!-- <script src="{{url('/assets')}}/lib/bootstrap-switch.js"></script> -->
  <!--custom tagsinput-->
  <script src="{{url('/assets')}}/lib/jquery.tagsinput.js"></script>
  <!--custom checkbox & radio-->


  <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->

  <script src="{{url('/')}}/js/jquery-3.5.0.min.js"></script>

  
  <script src="{{url('/')}}/js/mainn.js"></script>
  <script src="{{url('/')}}/js/form.js"></script>
  


  <!-- {{-- <script type="text/javascript" src="{{url('/assets')}}/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> -->
  <!-- <script type="text/javascript" src="{{url('/assets')}}/lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="{{url('/assets')}}/lib/bootstrap-daterangepicker/daterangepicker.js"></script> -->
  <!-- <script type="text/javascript" src="{{url('/assets')}}/lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script> --}} -->

  <!-- <script src="{{url('/assets')}}/lib/form-component.js"></script> -->





  
 
 


</body>

</html>

 