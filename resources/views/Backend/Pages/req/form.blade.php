@extends('Backend.layout.master_req')

    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->

@section('content')
 
<!-- <style> .bord-no { border: none; }</style> -->
<style>
    .disInline{
    display: inline;

    }

    .sec2 div  input{ 
    background: #ff000000;
    border: none;
    font-size: 18px;
 }

 input:focus{
    outline : none !important
  
 }

 /* // Extra small devices (portrait phones, less than 576px) */
@media (max-width: 575.98px) {  .sec2{
  text-align: center;
}  }

/* // Small devices (landscape phones, less than 768px) */
@media (max-width: 767.98px) { .sec2{
  text-align: center;
}   }
 
.size-Input{ width : 50px ;}


  </style>

       
  <div class="container  " style="
    background: white;
">  
     <div class="row sec2 " style="
    border: #00649b63 solid; " >  

    
          <form  name="myForm" method="post" action="{{ route('req.store') }}" onsubmit="return validateForm()" >

              <?php  $last_id = $last_id->id +1    ?>


              <div class="col-lg-6 col-md-3 col-sm-12 col-xs-12 "  style="
    float: right;
">
                <input class="  "  value ="{{ Request::old('user_Name') }}"   name="user_Name" id="user_Name"  type="text" 
                    style="border: 1px solid;font-size: 18px;text-align: center; " placeholder="ادخل اسم الموظف  "  
                         > 
             </div>
             
              
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12    ">  
                      <h4 class="disInline "> رقم الطلب   : </h4>
                      <input class="size-Input" type="text" readonly name="last_id"   value=" {{$last_id}} " > 
                </div>
                 <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12  " >
                   <h4 class="disInline"> اسم الفرع  : </h4>
                   <input class="size-Input" type="text" readonly name="branch_address"   value=" {{ Auth::user()->name }}" > 
                 </div>

                 <input class=" "  type="text" readonly name="support_id" hidden  value=" {{ Auth::user()->supportId }}" >   
         
            </div>
       </div>

                
            
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

                    @csrf
         
        <div class="row w-100  " style="margin-top: 10px;" >
          
            <div class="col-sm-4 col-md-4 col-lg-4"  >  
                  <table class="table table-bordered table-striped table-condensed col-sm-3 col-md-2 col-lg-2"  >
                  <thead>
                     <tr>
                       <th class="numeric " colspan="5">منتجات العطار </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       <th class="numeric">رمز المادة </th>
                        <th class="numeric"> اسم المادة </th>
                        <th class="numeric wid">الجرد </th>
                        <th class="numeric wid"> الكمية </th>
                        <th class="numeric wid"> الوحدة </th>
                      </tr>
                      @foreach($materialT2 as $key => $mm)  
                      
                      <tr>
                      <td   class="input wid"> <input type="number" readonly  class="input wid border-none"  name="material_id[]" value="{{$mm->id}}" style="border:none "> </td>
                      <td   class="input"  > {{$mm->name}}</td> 
                      <td   class="input"><input type="number"   class="input wid" onchange="input1(this)"    value ="{{ Request::old('qty1.'.$key)}}" name="qty1[]" > </td>
                      <td   class="input"><input type="number"   class="input wid" onchange="input2(this)"    value ="{{ Request::old('qty2.'.$key)}}" name="qty2[]" > </td>
                      <td   class="input center"  > {{$mm->unit}}</td> 
                      </tr>  
                      <?php     $for1 = $key  +1  ;  ?>

                      @endforeach       

                    </tbody>
                  </table>  
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4" style="display: inline;border: none;">  
                  <table class="table table-bordered table-striped table-condensed col-sm-3 col-md-2 col-lg-2"  >
                  <thead>
                     <tr>
                       <th class="numeric " colspan="5">المواد المساعدة </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       <th class="numeric">رمز المادة </th>
                        <th class="numeric"> اسم المادة </th>
                        <th class="numeric wid">الجرد </th>
                        <th class="numeric wid"> الكمية </th>
                        <th class="numeric wid"> الوحدة </th>

                      </tr>
                      @foreach($materialT3  as $key => $mm)  

                      <?php 
                          $i = 0 ;
                          $key += $for1 + $i;  
                      ?>
                      
                      <tr>
                      <td   class="input wid"> <input type="number" readonly class="input wid  border-none"  name="material_id[]" value="{{$mm->id}}"> </td>

                      <td   class="input"  > {{$mm->name}}</td> 
                    
                      <td   class="input" ><input type="number"   class="input wid" value ="{{ Request::old('qty1.'.$key)}}" name="qty1[]" > </td>
                      <td   class="input"><input type="number"   class="input wid"  value ="{{ Request::old('qty2.'.$key)}}" name="qty2[]" > </td>
                      <td   class="input center"  > {{$mm->unit}}</td> 
                      </tr> 
                      
                      <?php  
                           $i +=1 ;
                           $for2 = $key +1;
                         ?>

                      @endforeach       

                    </tbody>
                  </table>  
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4" >  
                  <table class="table table-bordered table-striped table-condensed col-sm-3 col-md-2 col-lg-2"  >
                    <thead>
                     <tr>
                       <th class="numeric " colspan="5"> المواد الاولية والجاهزة </th>
                      </tr>
                    </thead>
                      <tbody>
                      <tr>
                       <th class="numeric">رمز المادة </th>
                        <th class="numeric">  اسم المادة  </th>
                        <th class="numeric wid" >الجرد </th>
                        <th class="numeric wid"> الكمية </th>
                        <th class="numeric wid"> الوحدة </th>
                      </tr>
                      @foreach($material  as  $key => $mm)  

                      <?php 
                          $i = 0 ;
                          $key += $for2 + $i;  
                      ?>

                      <tr>
                      <td   class="input wid" > <input type="number" readonly class="input wid border-none"    name="material_id[]" value="{{$mm->id}}"> </td>
                    
                      <td   class="input  "  > {{$mm->name}}</td> 
                    
                      <td   class="input  "><input type="number"   class="input wid" value ="{{ Request::old('qty1.'.$key)}}"   id="qty1" name="qty1[]" > </td>
                      <td   class="input  "><input type="number" class="input wid"   value ="{{ Request::old('qty2.'.$key)}}"  id="qty2"  name="qty2[]" > </td>
                      <td   class="input center" > {{$mm->unit}}</td> 
                     </tr>  

                      <?php  
                           $i +=1 ;
                         ?>

                      @endforeach       
                    </tbody>
                  </table>  
            </div>
            </div>
       </div>
     </div>
    </div>
 </div>
            
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-4 -->
           </div>

           <input type="submit"  class="btn btn-default col-lg-12 col-md-12 col-sm-12 col-xs-12"    id="sendData" value="إرسال الطلب" style="background: #a3ffa3cc;"> 
           <!-- <input type="button"  class="btn btn-secondary col-lg-6 col-md-12 col-sm-12"  onclick="myFunction2()" value="تجهيز الطلب  " style="background:#ff7600 ;">  -->
            </form>
                  
      </section>            
      
 
  @endsection