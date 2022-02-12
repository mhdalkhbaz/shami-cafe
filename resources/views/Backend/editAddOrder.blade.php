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
          <a style="color: white" href="{{url('/')}}"  >    الصفحة الرئيسية  </a>
        </li>
        <li>
        @role('admin')
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
  <form method="post" id="form-data" action="{{url('/editAddOrderUpdate')}}/{{$id}}" enctype="multipart/form-data">
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
    <?php $multe=0; ?>
    @foreach ( $choclate_order11  as $choclate_order1)
     @if($choclate_order1->chocodetails_id == $choclate1->id)
     <?php $multe=1;?> 
    <td class="input input3" style=" width: 100px;"> 
      <input style=" width: 70px;" data-tituli="جرد:" type="number" id= 'jrd_count' name="jrd_count[]" value="{{ $choclate_order1->jrd_count }}"   min="0">غ
      </td>
    <td class="input input3" style=" width: 100px;"> 
    <input style=" width: 70px;" data-tituli="كمية:" type="number" id= 'order_count' name="order_count[]" value="{{ $choclate_order1->order_count }}"  min="0">غ
    </td>
    @endif
    @endforeach
    @if($multe!=1)
    <td class="input input3" style=" width: 100px;"> 
      <input style=" width: 70px;" data-tituli="جرد:" type="number" id= 'jrd_count' name="jrd_count[]" value="{{ old('jrd_count[]') }}"   min="0">غ
      </td>
    <td class="input input3" style=" width: 100px;"> 
    <input style=" width: 70px;" data-tituli="كمية:" type="number" id= 'order_count' name="order_count[]" value="{{ old('order_count[]') }}"  min="0">غ
    </td>
    @endif
    <td >  
      <input type="checkbox" name="id[]" id= 'id' value="{{$choclate1->id}}" >
    </td>
  </tr>
   @endforeach
  </tbody>
</table>
   <!-- <div>
    <label for="controlFile">chose image</label>
    <input type="file" name="image">
  </div>  -->
  <input type="submit"  class="btn btn-default col-lg-12" id="ajax" value="تعديل الطلب" > 
 </form>
</div>
</div>      
</div>
</div>              

           


          

 {{-- $function () {
   $('#form-data').submit(function (e) {
     var route = $('#form-data').data('route');
     var form_data = $(this);
   $.ajax({
     type: 'POST',
     url: route ,
     data: form_data.serialize() , 
     success: function (Response) {
       console.log(Response )
      
     }
   });

     e.preventDefault();
    
   })
  
 } --}}


            
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

//  $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
//             }
//         });

// $(document).ready(function(){
//   console.log('s');

//   jQuery('#btn-add').click(function () {
//         jQuery('#btn-save').val("add");
//         jQuery('#myForm').trigger("reset");
//         jQuery('#formModal').modal('show');
//     });

//     $('#form-data').submit(function(){

//   console.log('f');
//   console.log($(meta[name='csrf-token']).attr('content'));
//   var input1 = $('#jrd_count').val();
//   var input2 = $('#order_count').val();
//   var input3 = $('#id').val();
//   $.post('form-data' , {input1:jrd_count ,
//                         input2:order_count,
//                          input3:id
// }, function(data){
//   console.log(data);
//   $('#postRequest').html(data);
//    });
//   });      
//  });
</script>

  @endsection 


{{-- 
  <script>
    $(document).ready(function(){
      //console.log($("meta[name='csrf-token']").attr('content'));
    console.log('f');
      

    //    $('#ajax').click(function (e) {
    //      e.preventDefault();
         
        

    //    };
     });
</script> --}}