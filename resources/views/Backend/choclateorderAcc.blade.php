@extends('Backend.layout.choc')
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->

@section('content')


<style>

.choc {
  max-width: 1000px;

  /* margin: 130px 0px 200px 200px; */

}
.table>tbody>tr>td {

     padding: 8px;
      line-height: 2;
      text-align: center;
      vertical-align: unset;
      border: 1px solid black;
      border-collapse: collapse;
      background-color: rgba(250, 235, 215, 0.836);
    }
/* .choc .row .myorder {
  margin-top:50px 
} */
.edit{
  width: 200px;
color:rgb(240, 238, 235);
font-size: 30px;
 background: #090a09; 
text-align: center;
margin-right: 600px; 
border-radius: 5px;

}
    @media (max-width : 30em){
      .table>tbody>tr>td {
        padding:8px;
        line-height: 1;
        vertical-align: unset;
        border: 1px solid rgba(236, 214, 14, 0.288);
        border-collapse: collapse;
        width: auto;
        background-color: #000000b6;
       
        color: rgb(243, 239, 239);

      }
    }

</style>
<nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span> 
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <!-- <span> <img src ="bootstrap-solid.svg" width="30" height="30" class=" img d-inline-block align-center navbar-left-5 "> </span> -->
      <a style="color: white" class="navbar-brand navbar-left hvr-pop"> {{ Auth::user()->name }}</a> 
    </div>
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right ">
        {{-- <li>
          <a href="#" >   <span>  رقم الطلب:  </span>{{$last+1}} </a>
        </li>
        <li> --}}
          <li>
            <a style="color: white" href="{{url('/')}}"  >    الصفحة الرئيسية  </a>
          </li>
     
        <li> @role('admin')
          <a style="color: white" href="{{url('/choclateOrdersAll')}}" >  جميع الطلبات</a>
        @endrole   
        </li>
        <li class="active">
          <a style="color: white" href="{{url('/choclateOrders')}}" >  طلباتي</a>
        </li>
          <li ><a class="dropdown-item " style="color: white; "href="{{ url('/logout') }}">تسجيل خروج</a>
          
    
      </ul>
      
    </div>
  </div>  <!-- End of containeer-->
</nav>

@if(Session::has('message2'))
    <div class="container-form" style=" margin-left:550px; margin-right:550px; border-radius:5px; background:red;font-size: 25px;">
      <div class="form-title1" >
        <strong class="form-title  ">
          <span >  {{session()->get('message2')}}  </span>
    </strong>
      </div>
    </div>
   @endif

  @if(Session::has('status'))
  <div class="container-form" style=" margin-left:550px; margin-right:550px; border-radius:5px;">
    <div class="form-title1" >
      <strong class="form-title  ">
        <span >  {{session()->get('status')}}  </span>
  </strong>
    </div>
  </div>
 @endif
<div class="choc" style="margin-top: 0px;"> 
<div class="row">
  <div class="col-lg-12">

 <h2 style="text-align: center; font-size: 45px; font-weight: bold; color: #4a3e3e;" > طلباتي</h2>
 {{-- <div class="myorder" style="margin-top: 20px;">
 
</div> --}}
 <table class="table">
    <thead class="thead-dark">
      <tr>
        <th class="numeric">   حالة الطلب </th>
       <th class="numeric">  رقم الطلب </th>
      <th class="numeric">   تاريخ الطلب </th>
      </tr>
    </thead>
<tbody>
 @foreach ( $orderDetailsSent  as $choclateor)
 {{-- rowspan="2" --}}
 <tr>
  <td class="input wid" data-tituli="حالة الطلب ">  {{$choclateor->status}}</td>
    <td>   
      {{-- <a href="{{url('/choclateOrdersid/edit')}}/{{$choclateor->order_count_id}} " >حذف الطلب  </a>  /
      <a href="{{url('/choclateOrdersid/edit')}}/{{$choclateor->order_count_id}} " >تعديل الطلب  </a>  /  --}}
      <a href="{{url('/choclateOrdersid')}}/{{$choclateor->id}} " >{{$choclateor->id}} عرض الطلب {  {{$choclateor->order_count_id}} } </a> </td>
    {{-- <td class="input wid"name="choco_id" value="{{$choclate1->id}}">{{$choclate1->id}}</td> --}}

    <td class="input wid" data-tituli="تاريخ الطلب">  {{$choclateor->created_at}}</td>
  </tr>
   @endforeach
  </tbody>
</table>

  {{-- <div>
    <label for="controlFile">chose image</label>
    <input type="file" name="image">
  </div> --}}

</div>
</div>              
</div>
</div>         
 
  @endsection 