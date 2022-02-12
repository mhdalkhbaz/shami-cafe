@extends('Backend.layout.master_req')
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->

@section('content')
 
<section id="  ">
      <section class="container ">
       
      
       
      <div class="content-panel "style="height:10%;"  >
              <h2 style="text-align: center;" ><i class="fa fa-dote-left th-left center"></i> طلب شراء مواد</h2>
          
             
              <hr>
              @if(Session::has('success'))
                  <div class="alert alert-success">
                    {{Session::get('success')}}
                  </div>
                    @endif
                    @if(Session::has('Danger'))
                  <div class="alert alert-danger">
                    {{Session::get('Danger')}}
                  </div>
                    @endif
                   <hr style="border: none;">


        <div class="row mt ">
          <div class="col-lg-12">
          <h3 style="text-algin:center;text-align: center;color: black ;padding: 10px;background: #004f6169 ;font-family: system-ui"> الطلبات الحالية   </h3>
          <table class="table table-bordered table-striped table-condensed ">
          
                  <thead>
                    <tr>
                      <th class="border-none">رقم الطلب</th>
                      <th class="border-none">اسم المحل</th>
                      <th class="border-none">وقت الطلب </th> 
                      <th class="border-none">وقت الطلب </th> 
                     

                    </tr>
                  </thead>
                  <tbody>

              
                @if($orders_accept->count() > 0)
                @foreach($orders_accept as $order) 
                <tr>   
                   <td> {{$order->id}} </td>
                   <td> {{$order->branch_address}} </td>
                   <td> {{$order->create_at}} </td>
                   <td>  <a href="{{url('/order_acc')}}/{{$order->id}}" >عرض الطلب</a> </td>
                    </tr>
                @endforeach
                  </tbody>
                @else
                    <p class="bg-danger   p-1" style="padding: 5px;font-style: oblique;font-size: unset;">لا يوجد طلبات جديده </p>
                @endif
                

                 
                <tr>  <td colspan='4' style="text-algin:center;text-align: center;color: #041625ad;padding: 5px;font-family: system-ui;background: #eaeaea;">  <h4> الطلبات السابقة  </h4>   </td> </tr>
                  @foreach($orders_com as $order) 
                <tr>
                   <td> {{$order->id}} </td>
                   <td> {{$order->branch_address}} </td>
                   <td> {{$order->create_at}} </td>
             

                   
                    </tr>
                @endforeach
                  
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-4 -->
        </div>
<!-- 
@foreach($orders as $order) 

    {{$order->branch_name}}
 
@endforeach
 -->



@endsection