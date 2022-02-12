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
      <a style="color: white" class="navbar-brand navbar-left hvr-pop" > {{ Auth::user()->name }}</a> 
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
    <span >  {{session()->get('status')}}  </span>
</strong>
</div>

<div class="choc" style="margin-top: 0px;"> 

<div class="row">
  <div class="col-lg-12">

 <h2 style="text-align: center; font-size: 45px; font-weight: bold; color: #4a3e3e;" >تعديل طلباتي </h2>
 <div class="myorder" style="margin-top: 20px;">
  {{-- <a href="{{url('/')}}"  >  إضافة طلب جديد</a> --}}
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

      </tr>
    </thead>

<tbody>


 @foreach ( $choclate_order1  as $choclateor)
 {{-- rowspan="2" --}}
 <tr>
  <form method="post" id="form-data" action="{{url('/editChoclate')}}/{{$choclateor->id}}" enctype="multipart/form-data">
    <input  type="hidden" name="_token" value ="{{ csrf_token() }}" />
    @method('PUT')
  {{-- <td class="input wid" data-tituli="لون الليبل">  {{$choclateor->status}}</td> --}}
    <td class="input wid"  data-tituli="الكمية" style="width: 100px;"> 
       <input data-tituli="جرد:" type="number" name="jrd_count" value="{{$choclateor->jrd_count}}"  min="0" style="width: 70px;">
       غ</td>
    <td class="input wid"  data-tituli="الكمية" style="width: 100px;">
      <input data-tituli="جرد:" type="number" name="order_count" value="{{$choclateor->order_count}}"  min="0" style="width: 70px;">
       غ</td>
    <td class="input wid" data-tituli="نوع الحشوة">  {{$choclateor->typeFilling}}</td>
    {{-- <td class="input wid"name="choco_id" value="{{$choclate1->id}}">{{$choclate1->id}}</td> --}}
    <td class="input wid" rowspan="1" data-tituli="اسم القالب"> {{$choclateor->choco_name}}</td>
    <td class="input wid" data-tituli="لون">  {{$choclateor->color}}</td>  
    <td class="input wid" data-tituli="لون الليبل">  {{$choclateor->label}}</td>
    <td class="input wid" data-tituli="تاريخ الطلب">  {{$choclateor->created_at}}</td>
  </tr>
   @endforeach

  
  </tbody>
</table>
<input type="submit"  class="btn btn-default col-lg-12" id="ajax" value="تعديل الطلب" > 

</form>

  {{-- <div>
    <label for="controlFile">chose image</label>
    <input type="file" name="image">
  </div> --}}

</div>
</div>              
</div>
</div>         
 
  @endsection 