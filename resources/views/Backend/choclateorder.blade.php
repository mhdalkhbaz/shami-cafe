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
    nav  a{
  font-size: 15px;

}
/* .choc .row .myorder {
  margin-top:50px 
} */
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
      <a style="color: white" class="navbar-brand navbar-left hvr-pop" >{{ Auth::user()->user_name }}</a> 
    </div>
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right " >
        {{-- <li>
          <a href="#" >   <span>  رقم الطلب:  </span>{{$last+1}} </a>
        </li> --}}
        <li >
          <a style="color: white" href="{{url('/')}}"  >    الصفحة الرئيسية  </a>
        </li>
        <li> @role('admin')
          <a style="color: white" href="{{url('/choclateOrdersAll')}}"  >  جميع الطلبات</a>
             @endrole   
        </li>
        <li class="active">
          <a style="color: white" href="{{url('/choclateOrders')}}" >  طلباتي</a>
        </li>
          <li ><a  style="color: white; "href="{{ url('/logout') }}">تسجيل خروج</a>
      </ul>
      
    </div>
  </div>  <!-- End of containeer-->
</nav>



<div class="form-title1" >
  <strong class="form-title  ">
    <span >  {{session()->get('message')}}  </span>
</strong>
</div>

<div class="choc" > 

<div class="row">
  <div class="col-lg-12">

 <h2 style="text-align: center; font-size: 45px; font-weight: bold; color: #4a3e3e;" > تفاصيل الطلب</h2>
  <div class="myorder" style="margin-top: 20px;">
  <!-- <a class="back" href="{{url('/choclateOrders')}}"  >QQQQQQQQQQ
    <svg style=" padding-top:1px;color:black;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
    </svg>
  </a> -->

  <a href="{{url('/editAddOrder')}}/{{$id}}"  >  تعديل الطلب </a>
</div>
 <table class="table">
    <thead class="thead-dark">
      <tr>
        {{-- <th class="numeric">   حالة الطلب </th> --}}
       <th class="numeric">   الجرد</th>
       <th class="numeric">   الكمية</th>
       <th class="numeric">   نوع الحشوة</th>
      <th class="numeric">  اسم القالب</th>
      <th class="numeric">   لون </th>
      <th class="numeric">  لون الليبل </th>
      <th class="numeric">   تاريخ الطلب </th>
      <th class="numeric">     </th>
      </tr>
    </thead>

<tbody>
 @foreach ( $choclate_order  as $choclateor)
 {{-- rowspan="2" --}}
 <tr>
  {{-- <td class="input wid" data-tituli="لون الليبل">  {{$choclateor->status}}</td> --}}
    <td class="input wid"  data-tituli="الكمية">{{$choclateor->jrd_count}} غ</td>
    <td class="input wid"  data-tituli="الكمية">{{$choclateor->order_count}} غ</td>
    <td class="input wid" data-tituli="نوع الحشوة">  {{$choclateor->typeFilling}}</td>
    {{-- <td class="input wid"name="choco_id" value="{{$choclate1->id}}">{{$choclate1->id}}</td> --}}
    <td class="input wid" rowspan="1" data-tituli="اسم القالب"> {{$choclateor->choco_name}}</td>
    <td class="input wid" data-tituli="لون">  {{$choclateor->color}}</td>  
    <td class="input wid" data-tituli="لون الليبل">  {{$choclateor->label}}</td>
    <td class="input wid" data-tituli="تاريخ الطلب">  {{$choclateor->created_at}}</td>
    <td >  
    
    <a href="{{url('/choclateOrdersid/edit')}}/{{$choclateor->id}}"> تعديل </a> 
    {{-- /
    <a href="{{url('/choclateOrdersid/edit')}}/{{$choclateor->id}}"> حذف </a> --}}
  
    
    
    </td>

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