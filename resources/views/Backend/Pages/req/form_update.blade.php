@extends('Backend.layout.master_req')
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
<!--main content start-->

@section('content')



<div class="content-panel " style="height:10%;">
    <h2 style="text-align: center;"><i class="fa fa-dote-left th-left center"></i> طلب شراء مواد</h2>


    <hr>
    @foreach($order as $order)

    <form method="post" action="{{url('/order_update/store')}}">

        <h4> <input class="col-lg-2  col-sm-8 col-md-4 branch " type="text" readonly name="order_id"
                value="    {{$order->id}}    "> </h4>
        <h4> <input class="col-lg-2  col-sm-8 col-md-4 branch" type="text" readonly value="   رقم الطلب   : ">


            <h4> <input class="col-lg-2  col-sm-8 col-md-4 branch2" type="text" readonly value="   اسم الفرع   : ">
                <h4> <input class="col-lg-2  col-sm-8 col-md-4 branch2" type="text" readonly name="branch_address"
                        value=" {{$order->branch_address}} ">
                    <br>

                    
                    @endforeach

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


@csrf
<div>


    <div class="col-sm-3 col-md-3 col-lg-4">
        <table class="table table-bordered table-striped table-condensed col-sm-3 col-md-2 col-lg-2">
            <thead>
                <tr>
                    <th class="numeric " colspan="5"> منتجات العطار
                    </th>
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

                @foreach($materialT2 as $mm)

                <tr>
                    <td class="input wid"> <input type="number" readonly class="input wid border-none"
                            name="material_id[]" value="{{$mm->id}}"> </td>
                    <td class="input wid">{{$mm->name}} </td>


                    <?php 
                $multe=0;
                 ?>

                    @foreach ($req_t1 as $req)
                    @if($req->material_id == $mm->id)
                    <?php 
               $multe=1;?>
                    <td class="input  "><input type="number" class="input wid" name="qty1[]" value="{{$req->qty1}}">
                    </td>
                    <td class="input  "><input type="number" class="input wid" name="qty2[]" value="{{$req->qty2}}">
                    </td>
                    @endif
                    @endforeach

                    @if($multe!=1)
                    <td class="input  "><input type="number" class="input wid" name="qty1[]"> </td>
                    <td class="input  "><input type="number" class="input wid" name="qty2[]"> </td>
                    @endif
                    <td class="input center"> {{$mm->unit}}</td>

                </tr>

                @endforeach

            </tbody>
        </table>
    </div>

    <div class="col-sm-3 col-md-3 col-lg-4">
        <table class="table table-bordered table-striped table-condensed col-sm-3 col-md-2 col-lg-2">
            <thead>
                <tr>
                    <th class="numeric " colspan="5"> المواد المساعدة </th>
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

                @foreach($materialT3 as $mm)

                <tr>
                    <td class="input wid"> <input type="number" readonly class="input wid border-none"
                            name="material_id[]" value="{{$mm->id}}"> </td>
                    <td class="input wid">{{$mm->name}} </td>


                    <?php 
                      $multe=0;
                       ?>

                    @foreach ($req_t1 as $req)
                    @if($req->material_id == $mm->id)
                    <?php 
                     $multe=1;?>
                    <td class="input  "><input type="number" class="input wid" name="qty1[]" value="{{$req->qty1}}">
                    </td>
                    <td class="input  "><input type="number" class="input wid" name="qty2[]" value="{{$req->qty2}}">
                    </td>
                    @endif
                    @endforeach

                    @if($multe!=1)
                    <td class="input  "><input type="number" class="input wid" name="qty1[]"> </td>
                    <td class="input  "><input type="number" class="input wid" name="qty2[]"> </td>
                    @endif
                    <td class="input center"> {{$mm->unit}}</td>

                </tr>

                @endforeach

            </tbody>
        </table>
    </div>


    <div class="col-sm-3 col-md-3 col-lg-4">
        <table class="table table-bordered table-striped table-condensed col-sm-3 col-md-2 col-lg-2">
            <thead>
                <tr>
                    <th class="numeric " colspan="5"> المواد الاولية والجاهزة
                    </th>
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

                @foreach($material as $mm)

                <tr>
                    <td class="input wid"> <input type="number" readonly class="input wid border-none"
                            name="material_id[]" value="{{$mm->id}}"> </td>
                    <td class="input wid">{{$mm->name}} </td>

                    <?php 
              $multe=0;
               ?>

                    @foreach ($req_t1 as $req)
                    @if($req->material_id == $mm->id)
                    <?php 
             $multe=1;?>
                    <td class="input  "><input type="number" class="input wid" name="qty1[]" value="{{$req->qty1}}">
                    </td>
                    <td class="input  "><input type="number" class="input wid" name="qty2[]" value="{{$req->qty2}}">
                    </td>
                    @endif
                    @endforeach

                    @if($multe!=1)
                    <td class="input  "><input type="number" class="input wid" name="qty1[]"> </td>
                    <td class="input  "><input type="number" class="input wid" name="qty2[]"> </td>
                    @endif
                    <td class="input wid">{{$mm->unit}} </td>

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

<input type="submit" class="btn btn-default col-lg-12" value="قبول الطلب  " style="background: #a3ffa3cc;">
</form>

</section>
</section>
@endsection
