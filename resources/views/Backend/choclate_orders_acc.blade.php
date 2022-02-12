@extends('Backend.layout.master_req')
<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->


@section('content')

<style>

.input{
 text-align: center;
 color: black;
}
.border-none{
  color: rgb(14, 66, 90);
  background-color: rgba(12, 4, 4, 0.253);
  font-size: 15px;
  border: #eaeaea;
}
.branch{
display: flex;
  position: relative;
  padding-right: 5px;
  padding-left: 5px;
  background: #090a0a6b;
  padding-top:1px; 
  padding-bottom:1px; 
  margin-right:15px;
  margin-left:15px;
}
.branch h4   {
  width: 200px;
  /* border: 1px solid #004f6169; */
  border-radius: 5px;
  padding: 1px;
  font-size: 20px;
  color: white;
  margin-right:10px;
}
.branch .logout   {
  position: absolute;
  left: 0;
  top: 1px;
  width: auto;
  font-size: 20px;
  margin-left: 10px;

}
.branch .logout  a {
  color: white;
}
.branch .logout  a:hover {
  color: black;

}
    
</style>


@if(isset(Auth::user()->user_name))
      <div class = "branch info" style=" color:white;">
      <h4 class="h" >
        اسم المستخدم:   {{ Auth::user()->name }}
       </h4>
        @role('admin')
        <h4 class="h logout" >
        <a href="{{url('/')}}" style=" margin-left:100px " > الصفحة الرئيسية</a> </h4>
        @endrole  
      <h4  class="h logout" >|
      <a  href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
        {{-- <a href="{{url('/')}}" style="color: white; text-align:center;" > الصفحة الرئيسية</a></h4> --}}
      </h4>
 
     </div>
 
      @else
      <div>
        <script>window.location = "/login";</script>
      </div>
      @endif
<section id="  " >
<section class="container " style=" width:100%;">
<div class="content-panel "style="height:10%;"  >
<h2 style="text-align: center;" ><i class="fa fa-dote-left th-left center"></i> طلب شراء مواد</h2>


<hr>


<h3 style="text-align: center;color: black ;padding: 10px;background: #004f6169 ;font-family: system-ui"> طلبات الشوكولا     </h3>
{{-- mt --}}
<div class="row" >
  
@role('admin')
<div class="col-lg-4">

  <div style=" text-align: center;  color:black; margin-top:25px; ">
    
    <h5 style="font-size: 25px;">الطلبات  المرسلة</h2></div>
    <table class="table table-bordered table-striped table-condensed ">
    <thead>
    <tr>
    <th class="border-none">الفرع</th>
    <th class="border-none">الطلب</th>
    <th class="border-none">حالة الطلب</th> 
    <th class="border-none">تاريخ الطلب </th> 
    </tr>
    </thead>
    <tbody>
    
    @if($orderDetailsSent->count() > 0)
    @foreach($orderDetailsSent as $order) 
    <tr>   
    <td class="input"> {{$order->name}} </td>
    <td class="input">  <a href="{{url('/ChoclateOrder_acc')}}/{{$order->order_count_id}}/{{$order->branch_id}}" >عرض الطلب { {{$order->order_count_id}} }  </a> </td>
    {{-- <td> {{$order->order_id}} </td> --}}
    <td class="input"> {{$order->status}} </td>
    <td class="input"> {{$order->created_at}} </td>
    </tr>
    @endforeach

    @else
    <tr>   
      <td class="input" colspan="4"> لايوجد طلبات </td>
    </tr>
    @endif
    </tbody>
  </table>  
</div>
<div class="col-lg-4">
  <div style=" text-align: center;  color:black; margin-top:25px;">
    <h5 style="font-size: 25px;">الطلبات  قيد التحضير</h2></div>
    <table class="table table-bordered table-striped table-condensed ">
    <thead>
    <tr>
    <th class="border-none">الفرع</th>
    <th class="border-none">الطلب</th>
    <th class="border-none">حالة الطلب</th> 
    <th class="border-none">تاريخ الطلب </th> 
    </tr>
    </thead>
    <tbody>
    @if($orderDetailsReady->count() > 0)
    @foreach($orderDetailsReady as $order) 
    <tr>   

    <td class="input"> {{$order->name}} </td>
    <td class="input">  <a href="{{url('/ChoclateOrder_acc')}}/{{$order->order_count_id}}/{{$order->branch_id}}" >عرض الطلب { {{$order->order_count_id}} }  </a> </td>
    {{-- <td> {{$order->order_id}} </td> --}}
    <td class="input"> {{$order->status}} </td>
    <td class="input"> {{$order->created_at}} </td>
    </tr>
    @endforeach
   
    @else
    <tr>   
      <td class="input" colspan="4"> لايوجد طلبات </td>
    </tr>
    @endif
    </tbody>
    </table>  
</div>


<div class="col-lg-4">
  <div style=" text-align: center;  color:black; margin-top:25px;">
    <h5 style="font-size: 25px;">الطلبات  المجهزة</h2></div>
  <table class="table table-bordered table-striped table-condensed ">
      <thead>
      <tr>
      <th class="border-none">الفرع</th>
      <th class="border-none">الطلب</th>
      <th class="border-none">حالة الطلب</th> 
      <th class="border-none">تاريخ الطلب </th> 
      </tr>
      </thead>
      <tbody>
      @if($orderDetailsOk->count() > 0) 
      @foreach($orderDetailsOk as $order) 
      <tr>   

      <td class="input"> {{$order->name}}  </td>
      <td class="input">  <a href="{{url('/ChoclateOrder_acc')}}/{{$order->order_count_id}}/{{$order->branch_id}}" >عرض الطلب { {{$order->order_count_id}} }  </a> </td>
      {{-- <td> {{$order->order_id}} </td> --}}
      <td class="input"> {{$order->status}} </td>
      <td class="input"> {{$order->created_at}} </td>
      </tr>
      @endforeach
      @else
      <tr>   
        <td class="input" colspan="4"> لايوجد طلبات </td>
      </tr>
      @endif
    </tbody>
 </table>  
 </div>



@endrole

@role('labuser')

<div class="col-lg-6">
  <div style=" text-align: center;  color:black; margin-top:25px;">
    <h5 style="font-size: 25px;">الطلبات  قيد التحضير</h2></div>
    <table class="table table-bordered table-striped table-condensed ">
    <thead>
    <tr>
    <th class="border-none">الفرع</th>
    <th class="border-none">الطلب</th>
    <th class="border-none">حالة الطلب</th> 
    <th class="border-none">تاريخ الطلب </th> 
    </tr>
    </thead>
    <tbody>
    @if($orderDetailsReady->count() > 0)
    @foreach($orderDetailsReady as $order) 
    <tr>   

    <td class="input"> {{$order->name}} </td>
    <td class="input">  <a href="{{url('/ChoclateOrder_acc')}}/{{$order->order_count_id}}/{{$order->branch_id}}" >عرض الطلب { {{$order->order_count_id}} }  </a> </td>
    {{-- <td> {{$order->order_id}} </td> --}}
    <td class="input"> {{$order->status}} </td>
    <td class="input"> {{$order->created_at}} </td>
    </tr>
    @endforeach
   
    @else
    <tr>   
      <td class="input" colspan="4"> لايوجد طلبات </td>
    </tr>
    @endif
    </tbody>
    </table>  
</div>


<div class="col-lg-6">
  <div style=" text-align: center;  color:black; margin-top:25px;">
    <h5 style="font-size: 25px;">الطلبات  المجهزة</h2></div>
  <table class="table table-bordered table-striped table-condensed ">
      <thead>
      <tr>
      <th class="border-none">الفرع</th>
      <th class="border-none">الطلب</th>
      <th class="border-none">حالة الطلب</th> 
      <th class="border-none">تاريخ الطلب </th> 
      </tr>
      </thead>
      <tbody>
      @if($orderDetailsOk->count() > 0) 
      @foreach($orderDetailsOk as $order) 
      <tr>   

      <td class="input"> {{$order->name}}  </td>
      <td class="input">  <a href="{{url('/ChoclateOrder_acc')}}/{{$order->order_count_id}}/{{$order->branch_id}}" >عرض الطلب { {{$order->order_count_id}} }  </a> </td>
      {{-- <td> {{$order->order_id}} </td> --}}
      <td class="input"> {{$order->status}} </td>
      <td class="input"> {{$order->created_at}} </td>
      </tr>
      @endforeach
      @else
      <tr>   
        <td class="input" colspan="4"> لايوجد طلبات </td>
      </tr>
      @endif
    </tbody>
 </table>  
 </div>
 @endrole

</div>







<!-- 
{{-- @foreach($orders as $order) 

{{$order->branch_name}}

@endforeach --}}
-->

</section>

@endsection