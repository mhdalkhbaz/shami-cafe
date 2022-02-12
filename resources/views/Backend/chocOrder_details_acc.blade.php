@extends('Backend.layout.master_req')
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->

@section('content')
 
<style>

/* .table>tbody>tr>td {

padding: 8px;
 line-height: 2;
 text-align: center;
 vertical-align: unset;
 border: 1px solid black;
 border-collapse: collapse;
 background-color: rgba(250, 235, 215, 0.836);
} */
.table>tbody>tr>td{
  color: #080808cc;
  border: 1px solid black;
 border-collapse: collapse;
 border-top: 1px solid red;
 font-size: 20px;
}
 .table>tbody>tr>th,
 .table>tfoot>tr>td, .table>tfoot>tr>th
   {
  border: 1px solid black;
 border-collapse: collapse;
 border-top: 1px solid red;
 font-size: 20px;
 color: #2356b4cc;
  }
  .table>thead>tr>td, 
  .table>thead>tr>th
 {
 background-color: #004f6169;
 color: black;
 font-size: 30px;

} 
/* .numeric{
  border: 1px solid rgb(104, 48, 48);
 border-collapse: collapse;
 background: red;
} */

</style>
 
<div class="content-panel "style="height:10%;"  >
  <div class="row">
        <h2 style="text-align: center;  col-lg-2  col-sm-8 col-md-4 " ><i class="fa fa-dote-left th-left center"></i> طلب شراء مواد</h2>
    </div>        
        <hr>
  <br>
</div>

    {{-- @if(Session::has('success'))
  <div class="alert alert-success">
    {{Session::get('success')}}
  </div>
    @endif
    @if(Session::has('Danger'))
  <div class="alert alert-danger">
    {{Session::get('Danger')}}
  </div>
    @endif --}}

<hr style="border: none;">
<div>
 <div class="col-sm-12 col-md-12 col-lg-12"  >  
<table class="table table-bordered table-striped table-condensed col-sm-3 col-md-2 col-lg-2"  >
<thead>
    <tr >
      <th class="numeric " colspan="7" style="font-size: 25px;">    تفاصيل الطلب  </th>
    </tr>
  </thead>
  <tbody>
    <tr>
     
    <th class="numeric">   الكمية</th>   
    <th class="numeric">   الجرد</th>   
    <th class="numeric">   نوع الحشوة</th>
    <th class="numeric">  اسم القالب</th>
    <th class="numeric">   لون </th>
    <th class="numeric">  لون الليبل </th>

    @role('admin')
    <th class="numeric">   </th>
    @endrole  

    </tr>
    @foreach($req_t1 as $mm)  
    {{-- {{dd($req_t1)}}  --}}
    <tr style="text-align: center; font-size:15px;"> 
   <form method="post" id="form-data" action="{{url('/redyChoclateid')}}/{{$mm->order_count_id}}/{{$mm->branch_id}}" enctype="multipart/form-data"> 
        <input  type="hidden" name="_token" value ="{{ csrf_token() }}" />
        @method('PUT')

        <td class="input wid"  data-tituli="الكمية">{{$mm->order_count}} غ
          {{-- <input data-tituli="كمية:" type="number" name="order_count" value="{{$mm->order_count}}"  min="0" style="width: 50px;"> --}}

        </td> 
        <td class="input wid"  data-tituli="الجرد">{{$mm->jrd_count}} غ
          {{-- <input data-tituli="جرد:" type="number" name="jrd_count" value="{{$mm->jrd_count}}"  min="0" style="width: 50px;"> --}}
             
        </td>
        <td class="input wid" data-tituli="نوع الحشوة">  {{$mm->typeFilling}}</td>
        {{-- <td class="input wid"name="choco_id" value="{{$choclate1->id}}">{{$choclate1->id}}</td> --}}
        <td class="input wid" rowspan="1" data-tituli="اسم القالب"> {{$mm->choco_name}}</td>
        <td class="input wid" data-tituli="لون">  {{$mm->color}}</td>  
        <td class="input wid" data-tituli="لون الليبل">  {{$mm->label}}</td>

        @role('admin')
        <td class="input wid" data-tituli="">  
            <a href="{{url('/editChoclateid/edit')}}/{{$mm->id}}"> تعديل </a> 
            {{-- /
            <a href="{{url('/editChoclateid')}}/{{$mm->id}}"> حذف </a> --}}
        </td>
        @endrole

      </tr>
     
    @endforeach       
      </tbody>



</table>  
{{-- <hr class="w-100 branch">
@role('admin')
<input type="submit"   class="btn btn-default col-lg-6"  value="تعديل الطلب"   style="background: #a3eaffcc; font-size: 20px"> 
@endrole --}}
@if($mm->status=="قيد التحضير")
@role('labuser')
<input type="submit"   class="btn btn-default " name="ok" value="جاهز الطلب" style="font-size: 20px; background: #a3eaffcc; margin-left:150px; margin-right:150px; "> 
@endrole
@endif
@if($mm->status=="المرسلة")
@role('admin')
<input type="submit"   class="btn btn-default "  name="ready" value=" قيد التحضير" style="font-size: 20px; background: #a3eaffcc; margin-left:150px; margin-right:150px; "> 
@endrole
@endif
</form>
</div>
</div>
</div>
</div>
</div>

    </div>

</div>

  </section>            
</section>            
 
  @endsection