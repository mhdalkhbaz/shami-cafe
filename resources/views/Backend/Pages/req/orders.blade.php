@extends('Backend.layout.master_req')
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->

@section('content')
 

      <style>

        td {
          text-align: center;
        }
        th{
          text-align: right
        }
      </style>
<section id="  ">
      <section class="  ">
       
     <?php $test = 0 ;  ?>
      
      @role('admin')
      <?php  $test = 1  ; ?>
      @endrole
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

                  <div class="row ">
                     @role('alluser')
                    <div class="container">
                    <div class="col-lg-12">
                     @endrole

                  
                    @role('supervisor')
                        <div class="container">
                        <div class="col-lg-6">
                    @endrole
                    @role('admin')
                        <div class="col-lg-4">
                    @endrole
                      <table class="table table-bordered table-striped table-condensed ">
                        <thead>
                        <tr>
                          <td colspan="4"> الطلبات المرسلة  </td>
                        </tr>
                  
                          <tr>
                            <th class="border-none">رقم الطلب</th>
                            <th class="border-none">اسم الموظف</th>
                            <th class="border-none">اسم المحل</th>
                            <th class="border-none">وقت الطلب </th> 
                            <th class="border-none"> حالة الطلب   </th> 
                          </tr>
                        </thead>

                        <tbody>
                          @if($orders->count() > 0)
                          @foreach($orders as $order) 
                          <tr>   
                             <td> {{$order->id}} </td>
                             <td> {{$order->user_Name}} </td>
                             <td> {{$order->branch_address}} </td>
                             <td> {{$order->create_at}} </td>
                             <td>  <a href="{{url('/order')}}/{{$order->id}}" >عرض الطلب</a> </td>
                              </tr>
                          @endforeach
                            </tbody>
                          @else
                          <tr><td class="bg-danger   p-1" colspan="4" style="padding: 5px;font-style: oblique;font-size: unset;">لا يوجد طلبات جديده </td> </tr>
                             
                          @endif
                          
                        </tbody>
                        

                   </table>
                  </div>
                   

                  @role('admin|supervisor')

                  @role('supervisor')
                        <div class="col-lg-6">
                    @endrole
                    @role('admin')
                        <div class="col-lg-4">
                    @endrole

                    <table class="table table-bordered table-striped table-condensed ">
                      <thead>
                      <tr>
                        <td colspan="4">طلبات المقبولة</td>
                      </tr>
                
                        <tr>
                          <th class="border-none">رقم الطلب</th>
                          <th class="border-none">اسم الموظف</th>
                          <th class="border-none">اسم المحل</th>
                          <th class="border-none">وقت الطلب </th> 
                          <th class="border-none"> حالة الطلب   </th> 
                        </tr>
                      </thead>

                      <tbody>
                        @if($orders_accept->count() > 0)
                        @foreach($orders_accept as $order) 
                        <tr>   
                           <td> {{$order->id}} </td>
                           <td> {{$order->user_Name}} </td>
                           <td> {{$order->branch_address}} </td>
                           <td> {{$order->create_at}} </td>
                           <td>  <a href="{{url('/order_acc')}}/{{$order->id}}" >عرض الطلب</a> </td>
                            </tr>
                        @endforeach
                          </tbody>
                        @else
                            <tr><td class="bg-danger   p-1" colspan="4" style="padding: 5px;font-style: oblique;font-size: unset;">لا يوجد طلبات جديده </td> </tr>
                        @endif
                        
                      </tbody>
                      

                 </table>

                 @endrole


                 @role('admin')

                </div> <div class="col-lg-4">
                  <table class="table table-bordered table-striped table-condensed ">
                    <thead>
                    <tr>
                      <td colspan="4">طلبات المجهزة</td>
                    </tr>
              
                      <tr>
                        <th class="border-none">رقم الطلب</th>
                        <th class="border-none">اسم المحل</th>
                        <th class="border-none">وقت الطلب </th> 
                        <th class="border-none"> حالة الطلب   </th> 
                      </tr>
                    </thead>
                    <tbody>
                    @if($orders_com->count() > 0)
                    @foreach($orders_com as $order) 
                    <tr>   
                       <td> {{$order->id}} </td>
                       <td> {{$order->branch_address}} </td>
                       <td> {{$order->create_at}} </td>
                       <td>  <a href="{{url('/order_com')}}/{{$order->id}}" >عرض الطلب</a> </td>
                        </tr>
                    @endforeach
                      </tbody>
                    @else
                    <tr><td class="bg-danger   p-1" colspan="4" style="padding: 5px;font-style: oblique;font-size: unset;">لا يوجد طلبات جديده </td> </tr>
                    @endif
                    
                    

                    

                  </tbody>
                  @endrole
               </table>
              </div>
              </div>

@endsection