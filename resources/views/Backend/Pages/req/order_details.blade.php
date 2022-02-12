@extends('Backend.layout.master_req')
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->

@section('content')
 

 
      <div class="content-panel "style="height:10%;"  >
              <h2 style="text-align: center;" ><i class="fa fa-dote-left th-left center"></i> طلب شراء مواد</h2>
          
             
              <hr>
             
        
                    @foreach($order as $order)
                    <form method="post" action="{{ url('order/update')}}/{{$order->id}}" >
                  @csrf
                 <h4> <input class="col-lg-2  col-sm-8 col-md-4 branch "   type="text"   readonly  name="order_id"     value="   {{$order->id}}    " >   </h4>
                <h4> <input class="col-lg-2  col-sm-8 col-md-4 branch"   type="text"    readonly      value="   رقم الطلب   : " >  
                 <h4 >  <input class="col-lg-2  col-sm-8 col-md-4 branch2" type="text"  readonly value="   اسم الفرع   : " > 
                 <h4 >  <input class="col-lg-2  col-sm-8 col-md-4 branch2"  type="text"  readonly name="branch_address"   value="  {{$order->branch_address}}   " >   
                @endforeach
                 <br>
            
                   </div>
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
                    
                    
                    <div>
                      
                      <div class="col-sm-3 col-md-3 col-lg-4"  >  
                            <table class="table table-bordered table-striped table-condensed col-sm-3 col-md-2 col-lg-2"  >
                            <thead>
                               <tr>
                                 <th class="numeric " colspan="4">منتجات العطار </th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                 <th class="numeric">رمز المادة </th>
                                  <th class="numeric"> اسم المادة </th>
                                  <th class="numeric wid">الجرد </th>
                                  <th class="numeric wid"> الكمية </th>
                                </tr>
                                @foreach($req_t2 as $mm)  
                                <tr>
                                <td   class="input wid"> {{$mm->material_id}}  </td>
                                <td   class="input wid"> {{$mm->name}}  </td>
                   
                                <td   class="input">{{$mm->qty1}} </td>
                                <td   class="input"> {{$mm->qty2}} </td>
                                </tr>  
                                @endforeach       
            
                              </tbody>
                            </table>  
                      </div>
                      <div class="col-sm-3 col-md-3 col-lg-4"  >  
                            <table class="table table-bordered table-striped table-condensed col-sm-3 col-md-2 col-lg-2"  >
                            <thead>
                               <tr>
                                 <th class="numeric " colspan="4">مواد مساعدة </th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                 <th class="numeric">رمز المادة </th>
                                  <th class="numeric"> اسم المادة </th>
                                  <th class="numeric wid">الجرد </th>
                                  <th class="numeric wid"> الكمية </th>
                                </tr>
                                @foreach($req_t3 as $mm)  
                                <tr>
                                <td   class="input wid"> {{$mm->material_id}}  </td>
                                <td   class="input wid"> {{$mm->name}}  </td>
                   
                                <td   class="input">{{$mm->qty1}} </td>
                                <td   class="input"> {{$mm->qty2}} </td>
                                </tr>  
                                @endforeach       
            
                              </tbody>
                            </table>  
                      </div>
                      <div class="col-sm-3 col-md-3 col-lg-4"  >  
                        <table class="table table-bordered table-striped table-condensed col-sm-3 col-md-2 col-lg-2"  >
                <thead>
                   <tr>
                     <th class="numeric " colspan="4">المواد الاولية والجاهزة </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                     <th class="numeric">رمز المادة </th>
                      <th class="numeric"> اسم المادة </th>
                      <th class="numeric wid">الجرد </th>
                      <th class="numeric wid"> الكمية </th>
                    </tr>
                    @foreach($req_t1 as $mm)  
                    <tr>
                    <td   class="input wid"> {{$mm->material_id}}  </td>
                    <td   class="input wid"> {{$mm->name}}  </td>
       
                    <td   class="input">{{$mm->qty1}} </td>
                    <td   class="input"> {{$mm->qty2}} </td>
                    </tr>  
                    @endforeach       

                  </tbody>
                </table>  
          </div>
           
 
           
           
            </div>
            </div>
            </div>
            </div>
            
       
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-4 -->
          
      </div>

                           
          <hr class="w-100">

          @role('admin|supervisor')
            <a href="{{ url('order_update')}}/{{$order->id}}/{{$order->branch_address}}" class="col-lg-6  btn btn-primary">تعديل </a>
           <input type="submit"   class="btn btn-default col-lg-6"  value="تم قبول الطلب"  style="background: #a3ffa3cc;"> 
            </form>
          @endrole     
            <a href="{{ route('orders')}}" class="col-lg-12  btn btn-info">عودة  </a>

      </section>            
      </section>            
 
  @endsection