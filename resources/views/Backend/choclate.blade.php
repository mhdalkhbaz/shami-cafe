@extends('Backend.layout.choc')
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->

@section('content') 

<!-- {{-- 
<div class="account">
    @if(isset(Auth::user()->user_name))
       <div class="alert alert-danger success-block">
        <strong>{{ Auth::user()->user_name }} :اهلا بك </strong>
        <br />
        <a href="{{ url('/login/logout') }}">Logout</a>
       </div>
      @else
       <script>window.location = "/login";</script>
    @endif
  </div> --}} -->


  <style>

nav  a{
  font-size: 15px;

}

  </style>


<nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only"></span> 
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <!-- <span> <img src ="bootstrap-solid.svg" width="30" height="30" class=" img d-inline-block align-center navbar-left-5 "> </span> -->
      <a style="color: white" class="navbar-brand navbar-left hvr-pop" > {{ Auth::user()->name }}</a> 
    </div>
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right ">
        {{-- <li>
          <a href="#" >   <span>  رقم الطلب:  </span>{{$last+1}} </a>
        </li> --}}
        <li class="active">
          <a style="color: white" href="{{url('/')}}"  >   طلبات شراء المواد  </a>
        </li>
        <li> @role('admin')
          <a style="color: white" href="{{url('/choclateOrdersAll')}}" >  جميع الطلبات</a>
        @endrole   
        </li>
        <li>
          <a style="color: white" href="{{url('/choclateOrders')}}" >  طلباتي</a>
        </li>
          <li class="logou" ><a  style="color: white; "href="{{ url('/logout') }}">تسجيل خروج</a>
          </li>

      </ul>
      
    </div>
  </div>  <!-- End of containeer-->
</nav>

<!-- 
{{-- @if(Session::has('success'))
    <div class="alert alert-success">
    {{Session::get('success')}}
    </div>
  @endif

  @if(Session::has('Danger'))
  <div class="alert alert-danger">
    {{Session::get('Danger')}}
  </div>
@endif
<hr style="border: none;"> --}}
             {{-- @csrf --}} -->
        
@if(Session::has('message'))
  <div class="container-form" style=" margin-left:550px; margin-right:550px; border-radius:5px;">
    <div class="form-title1" >
      <strong class="form-title  ">
        <span >  {{session()->get('message')}}  </span>
  </strong>
    </div>
  </div>
 @endif
 @if(Session::has('message2'))
  <div class="container-form" style=" margin-left:550px; margin-right:550px; border-radius:5px; background:red;font-size: 25px;">
    <div class="form-title1" >
      <strong class="form-title  ">
        <span >  {{session()->get('message2')}}  </span>
  </strong>
    </div>
  </div>
 @endif


<div class="choc" >  
  <div class="row">
    <div class="col-lg-12">
     
  <form method="post" id="form-data" action="{{url('/insert')}}" enctype="multipart/form-data">
    <input  type="hidden" name="_token" value ="{{ csrf_token() }}" />
  <h2 style="text-align: center; font-size: 45px; font-weight: bold; " >طلب شوكولا </h2>

  <table class="table display nowrap" cellspacing="0" id="exam">
    <thead class="thead-dark">
      <tr>
        
      <th class="numeric">  رقم القالب </th>
      <th class="numeric">   نوع الحشوة</th>
      <th class="numeric">  شكل القالب </th>
      <th class="numeric">  اسم القالب</th>
      <th class="numeric">   لون </th>
      <th class="numeric">  لون الليبل </th>
      <th class="numeric">    الجرد</th>
      <th class="input3">    الكمية</th>
      <th class="numeric">    </th>
      </tr>
    </thead>

<tbody>
  
 @foreach ( $choclate  as $choclate1)
 <!-- {{-- rowspan="2" --}} -->
 <tr>
  
    <td class="input wid" data-tituli="رقم القالب:">{{$choclate1->choco_id}}</td>
    <td class="input wid" data-tituli="نوع الحشوة:">  {{$choclate1->typeFilling}}</td>
    <!-- {{-- <td class="input wid"name="choco_id" value="{{$choclate1->id}}">{{$choclate1->id}}</td> --}} -->
    <td class="input wid" rowspan="1" data-tituli="شكل القالب:" > <img style=" width: 50px;" src="{{asset('/storage/images/products/'.$choclate1->choco_img)}}" />   </td>
    <td class="input wid" rowspan="1" data-tituli="اسم القالب:" > {{$choclate1->choco_name}}</td>
    <td class="input wid" data-tituli="لون: ">  {{$choclate1->color}}</td>  
    <td class="input wid" data-tituli="لون الليبل:" >  {{$choclate1->label}}</td>
    <td class="input input3" style=" width: 100px;"> 
      <input style=" width: 70px;" data-tituli="جرد:" type="number" id='jrd_cowunt' name="jrd_count[]" value="{{ old('jrd_count[]') }}"   min="0">غ
      </td>
    <td class="input input3" style=" width: 100px;"> 
    <input style=" width: 70px;" data-tituli="كمية:" type="number" id='order_cwount' name="order_count[]" value="{{ old('order_count[]') }}"  min="0">غ
    </td>
    <td >  
      <input type="checkbox" name="id[]" id= 'wid' value="{{$choclate1->id}}" >
    </td>
  </tr>
   @endforeach
  </tbody>
</table>

   <!-- <div>
    <label for="controlFile">chose image</label>
    <input type="file" name="image">
  </div>  -->

  <input type="submit"  class="btn btn-default col-lg-12" id="ajax" value="إرسال الطلب" > 

 </form>
</div>
</div>      
</div>
</div>              

           


<div class="col-md-4 col-md-offset-4">
     <h4>Add new student</h4><hr>
        <form action="{{ route('savs') }}" method="post" id="main_form">
        @csrf
            <div class="form-group">
                 <label>Name</label>
                 <input type="text" class="form-control" name="name" placeholder="Enter your name">
                 <span class="text-danger error-text name_error"></span>
            </div>
            <div class="form-group">
                 <label>Email</label>
                 <input type="text" class="form-control" name="email" placeholder="Enter your email">
                 <span class="text-danger error-text email_error"></span>
            </div>
            <div class="form-group">
                 <label>Password</label>
                 <input type="password" class="form-control" name="password" placeholder="Enter password">
                 <span class="text-danger error-text password_error"></span>
            </div>
            <br>
            <button type="submit" class="btn btn-block btn-primary">Save</button>
        </form>
     </div>


            
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->


  @endsection 


