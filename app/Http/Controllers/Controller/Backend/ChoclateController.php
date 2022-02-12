<?php

namespace  App\Http\Controllers\Controller\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\choco;
use App\user;
use App\choco_details;
use App\choco_order;
use App\order_details;
use App\choco_order_det;

use App\Model\Backend\Material;

use App\Model\Backend\Order;

use Illuminate\Support\Facades\URL;

class ChoclateController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
public function redyChoclateid( $id , $branch){

  if (request()->has('ready') ){
    $choco = choco_order_det::where( 'order_count_id' , $id)->where( 'branch_id' , $branch)->first();
    $choco->status  = 'قيد التحضير' ;
    $choco->save();
    return redirect('/choclateOrdersAll')->with('status', 'تم تعديل الطلب');
  }
  elseif(request()->has('ok') ){
    $choco = choco_order_det::where( 'order_count_id' , $id)->where( 'branch_id' , $branch)->first();
    $choco->status  = 'جاهز' ;
    $choco->save();
    return redirect('/choclateOrdersAll')->with('status', 'تم تعديل الطلب');
  }
  

 // News::whereIn('id' , request('id'))->forceDelete();
}

public function editChoclate2(Request $request ,  $id){
  $choco = choco_order::find($id);
  $this->validate($request ,[
  ]);
  $choco->order_count  =  $request->order_count ;
  $choco->jrd_count  =  $request->jrd_count ;
  $choco->save();
  //return redirect()->back();
       return redirect('/choclateOrdersAll')->with('status', 'تم تعديل الطلب');
}
    
public function editChoclate(Request $request ,  $id){
  $choco = choco_order::find($id);
  $this->validate($request ,[
  ]);
  $choco->order_count  =  $request->order_count ;
  $choco->jrd_count  =  $request->jrd_count ;
  $choco->save();
      return redirect('/choclateOrders')->with('status', 'تم تعديل الطلب');
}

public function edit2( $id){
  $choclate_order = DB::table('choco_orders')
  ->where('choco_orders.id' ,  $id)
  ->select('choco_orders.*')
  ->get();
    return  view('Backend.editchocOrder_details_acc'  ,compact('choclate_order' ));
 }

public function edit( $id){
  $choclate_order1 = DB::table('choco_orders')
  ->where('choco_orders.id' ,  $id)
  ->select('choco_orders.*')
  ->get();
  return  view('Backend.editchoclateOrder'  ,compact('choclate_order1' ));
  }
public function orders($id){

  $choclate_order = DB::table('choco_orders')
  ->join('choco_order_dets', 'choco_order_dets.id', '=', 'choco_orders.ch_id')
  ->where('choco_order_dets.branch_id' , auth()->user()->id)
  ->where('choco_orders.ch_id' ,  $id)
  ->select('choco_orders.*' , 'choco_order_dets.branch_id')
  ->get();



  $choclate_order1 = DB::table('choco_orders')
  ->join('choco_order_dets', 'choco_order_dets.id', '=', 'choco_orders.ch_id')
  ->where('choco_order_dets.branch_id' , auth()->user()->id)
  ->where('choco_order_dets.order_count_id' ,  $id)
  ->select('choco_orders.*' , 'choco_order_dets.branch_id')
  ->get();
  $last = choco_order_det::where('branch_id', '=', auth()->user()->id )->get()->count();

    return  view('Backend.choclateorder'  ,compact('choclate_order' , 'last' , 'id'));
}

public function editAddOrder($id){
   $arr = array();
  $choclate_order11 = DB::table('choco_orders')
  ->join('choco_order_dets', 'choco_order_dets.id', '=', 'choco_orders.ch_id')
  ->where('choco_order_dets.branch_id' , auth()->user()->id)
  ->where('choco_orders.ch_id' ,  $id)
  ->select('choco_orders.*' , 'choco_order_dets.branch_id')
  ->get();



  $choclate = DB::table('choco_details')
  ->join('chocos', 'chocos.id', '=', 'choco_details.choco_id')
  ->select('chocos.choco_name', 'choco_details.choco_id', 'chocos.choco_img', 
  'choco_details.id', 'choco_details.color', 'choco_details.label', 'choco_details.typeFilling')
  ->get();

  $last = choco_order_det::where('branch_id', '=', auth()->user()->id )->get()->count();

//   foreach($choclate as $choclate1){
//   foreach($choclate_order11 as $choclate_order1){
//       if($choclate1->id == $choclate_order1->chocodetails_id ){
//         // $result1 = (array)$choclate1 + (array)$choclate_order1;
//         array_push($arr, $choclate_order1);
//       }
//       else{
//         array_push($arr, $choclate1);
//       }
//     }
//   }
// $array1 = array(0 => 'zero_a', 2 => 'two_a', 3 => 'three_a');
// $array2 = array(1 => 'one_b', 3 => 'three_b', 4 => 'four_b');
// $result = (array)$choclate + (array)$choclate_order11;
// // var_dump($result);

// $beginning = 'foo';
// $end = array(1 => ['bar' , 'KK' , 'L'],
//               3 => 'LL'
//               );
// $result = array_merge((array)$beginning, (array)$end);
  // dd($choclate);

    return  view('Backend.editAddOrder'  ,compact('choclate' , 'last' , 'choclate_order11' , 'id' ));
}

public function editAddOrderUpdate($id , Request $request){
  $updateOrder = choco_order::where( 'ch_id' , $id)
  ->get();

  $v1= array_filter($request->order_count , function($item){
    return ! is_null($item);
  });
  $v2= array_filter($request->jrd_count , function($item){
    return ! is_null($item);
  });
 
  $count = 0;

  $a = array();
  $a1 = 1 ;
  // dd($request->all());
  foreach($updateOrder as $updateOrders){
    foreach($v1 as $v1s=>$key){
      if($updateOrders->chocodetails_id == $v1s+1 ){
        $updateOrders->order_count = $key ;
        $updateOrders->jrd_count = $v2[$v1s];
        $updateOrders->save();
        $a[$a1] = $v1s ; 
        $a1++;
        // array_push($a, $v1s );
        $count++;
      }
        
    }
  }
  foreach($v1 as $v1s=>$key){
    $s  = array_search( $v1s , $a );
    // dd($s);
      if( $s==false){
          $chocDet = choco_details::find($v1s+1);
          $dele1 = choco::find($chocDet->choco_id);

        if (choco_order::where('chocodetails_id', '=', $v1s+1)
              ->where('order_count_id' , '=' , $updateOrders->order_count_id )
              ->where('choco_name' ,'=' , $dele1->choco_name )
              ->where('color' , '=' ,   $chocDet->color)
              ->where('label' , '=' , $chocDet->label )
              ->where('typeFilling' , '=' , $chocDet->typeFilling )
              ->where('ch_id' , '=' , $id )
             ->exists()) {
              abort(422, 'You must edit something.');
       }
        else{
          
          // dd($dele1);
          $addChoOr = choco_order::create([
            'chocodetails_id' => $v1s+1 ,
            'order_count_id' => $updateOrders->order_count_id ,
            'choco_name' => $dele1->choco_name,
            'color' => $chocDet->color,
            'label' =>  $chocDet->label,
            'typeFilling' => $chocDet->typeFilling,
            'ch_id' => $id ,
            'order_count' => $key,
            'jrd_count' =>   $v2[$v1s] ,
          ]);
        }
              
    }
  }

  $key = array_search('21', $a);
  // dd($count);


  session()->flash('message2', '   تم تعديل الطلب ');
  return redirect('/choclateOrders');
  
  // return  choclateOrders;

}

public function ordersAcc(){

      $choclate_order =  choco_order::all();

      $orderDetailsSent = DB::table('choco_order_dets')
      ->join('users', 'users.id', '=', 'choco_order_dets.branch_id')
      ->select('users.name' , 'choco_order_dets.*' )
      ->where('users.name' , auth()->user()->name )
      ->get();
      $last = choco_order_det::where('branch_id', '=', auth()->user()->id )->get()->count();


      return  view('Backend.choclateOrderAcc'  ,compact('orderDetailsSent' , 'last'));
}

public function allOrders(){
    //   $orderDetails=  order_details::all();;

      $orderDetailsSent = DB::table('choco_order_dets')
      ->join('users', 'users.id', '=', 'choco_order_dets.branch_id')
    //   ->join('choco_orders', 'choco_orders.id', '=', 'order_details.order_id')
      ->select('users.name' , 'choco_order_dets.*' )
      ->where('choco_order_dets.status' , 'المرسلة')
      // ->where('users.name' , 'طرطوس')
      ->orderBy('choco_order_dets.created_at' , 'desc')
      ->get();
    // dd($orderDetailsSent);
      $orderDetailsReady = DB::table('choco_order_dets')
      ->join('users', 'users.id', '=', 'choco_order_dets.branch_id')
    //   ->join('choco_orders', 'choco_orders.id', '=', 'order_details.order_id')
      ->select('users.name' , 'choco_order_dets.*' )
      ->where('choco_order_dets.status' , 'قيد التحضير')
      ->orderBy('choco_order_dets.created_at' , 'desc')
      ->get();

      $orderDetailsOk = DB::table('choco_order_dets')
      ->join('users', 'users.id', '=', 'choco_order_dets.branch_id')
    //   ->join('choco_orders', 'choco_orders.id', '=', 'order_details.order_id')
      ->select('users.name' , 'choco_order_dets.*' )
      ->where('choco_order_dets.status' , 'جاهز')
      ->orderBy('choco_order_dets.created_at' , 'desc')
      ->get();

      // $order = Order::select()
      // ->where('id',$id)
      // ->get(); 

      return  view('Backend.choclate_orders_acc'  ,compact('orderDetailsSent' ,'orderDetailsReady'  ,'orderDetailsOk'  ));
}

public function create()
{

  $material=  choco::all();;
  
  $choclate = DB::table('choco_details')
  ->join('chocos', 'chocos.id', '=', 'choco_details.choco_id')
  ->select('chocos.choco_name', 'choco_details.choco_id', 'chocos.choco_img', 
  'choco_details.id', 'choco_details.color', 'choco_details.label', 'choco_details.typeFilling')
  ->get();

    $last = choco_order_det::where('branch_id', '=', auth()->user()->id )->get()->count();
      // return view('Backend.choclate',compact('material','materialT2','materialT3','last_id','branch'));
   return view('Backend.choclate' ,compact( 'choclate','last'));

  // return view('Backend.choclate' ,compact('material' , 'last_id','branch'));

  //SELECT choco_name,  choco_img , color , label , typeFilling  FROM chocos c INNER JOIN choco_details cd ON c.id = cd.choco_id

}

public function insert(Request $request){
  dd($request->all());

  $v1= array_filter($request->order_count , function($item){
    return ! is_null($item);
  });
  $v2= array_filter($request->jrd_count , function($item){
    return ! is_null($item);
  });
 
$sum = 0;
if($request->id!=null){
foreach($request->id as $item=>$v ){
  
  if($request->jrd_count[$v-1]!=null && $request->order_count[$v-1]!=null){
    $sum++;
   }
   else{
    $sum=-1000000;
   }
    }
    }
    else{
    $sum=-1000000;
  }
  if(  $sum>0 )
  {


    $last = choco_order_det::where('branch_id', '=', auth()->user()->id )->get()->count();
    
    $orderDet = new choco_order_det();
    $orderDet = choco_order_det::create([
      'branch_id' => auth()->user()->id,
      'order_count_id' => $last+1,  
    ]);

     foreach($request->id as $item=>$v ){
      $chocDet = choco_details::find($v);
      $dele1 = choco::find($chocDet->choco_id);

      $addChoOr = choco_order::create([
        'chocodetails_id' => $chocDet->id,
        'order_count' => $request->order_count[$v-1],
        'jrd_count' =>   $request->jrd_count[$v-1] ,
        'order_count_id' => $last+1,
        'choco_name' => $dele1->choco_name,
        'color' => $chocDet->color,
        'label' =>  $chocDet->label,
        'typeFilling' => $chocDet->typeFilling,
        'ch_id' => $orderDet->id,
    ]);
   
   } 
      session()->flash('message', ' تم الارسال');
      return redirect('/chocCreate');
    }
    else{
    session()->flash('message2', '   تحقق من ادخال البيانات ');
    return redirect('/chocCreate');
    }

}

public function show_acc(Request $request, $id , $branch)
{    
  //dd($request->value);
  $req_t1 = DB::table('choco_orders')
  ->join('choco_order_dets', 'choco_order_dets.id', '=', 'choco_orders.ch_id')
  ->where('choco_order_dets.branch_id' , $branch)
  ->where('choco_order_dets.order_count_id' ,  $id)
  ->select('choco_orders.*' , 'choco_order_dets.branch_id' ,'choco_order_dets.status')
  ->get();


  $order = Order::select()
  ->where('id',$id)
  ->get();

    return view('Backend.chocOrder_details_acc',compact('req_t1' , 'order'));
}

}

       // $orderDet->status = 'جاهز' ;
          

        //    $last = choco_order_det::latest()->first()
        //    ->where('branch' , '2')   ;
          

        //    $last = DB::table('choco_order_det')->count()->where('branch_id','1');
           
        //   $last = choco_order_det::where('branch_id', '=', '2')->get()->count();
           
        //    choco_order_det::select(  DB::raw("count(order_count_id) as count"))
        //    ->where('branch_id' , '2')  
        //   ->get();

      //    dd($last);

          //   dd($request->id);

    //  $addy = new choco;
    //  if($request->hasFile('image')){
    //      $destination_path = 'public/images/products';
    //      $image = $request->file('image');
    //      $image_name = $image->getClientOriginalName();
    //      $path = $request->file('image')->storeAs($destination_path,$image_name);
    //      $addy->choco_name =  $image_name;
    //      $addy->choco_img =  $image_name;

    //     }

    //     $addy->save();
