<?php
namespace  App\Http\Controllers\Controller\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     *
     * 
     * 
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly create_at resource in storage.
     *
  
      */
    //   @return \Illuminate\Http\Response
    // * @param  \Illuminate\Http\Request  $request
    // * @return \Illuminate\Http\Response
        public function store(Request $request)
        {
            $data=$request->all();
            // dd($data);
            $lastid=Order::create($data)->id;
            if(count($request->product_name) > 0)
            {
            foreach($request->product_name as $item=>$v){
                $data2=array(
                    'order_id'=>$lastid,
                    'product_name'=>$request->product_name[$item],
                    'brand'=>$request->brand[$item],
                    'quantity'=>$request->quantity[$item],
                    'budget'=>$request->budget[$item],
                    'amount'=>$request->amount[$item]
                );
            Item::insert($data2);
          }
            }
            return redirect()->back()->with('success','data insert successfully');
        }


    /**
     * Display the specified resource.
     *
     */
    // public function show($id)
    // {
    //     //
    // }

    // * @param  int  $id
    // * @return \Illuminate\Http\Response
    /**
     * Show the form for editing the specified resource.
     *
     *
     */
    // public function edit($id)
    // {
    //     // @param  int  $id
    // //  * @return \Illuminate\Http\Response
    // }

    /**
     * Update the specified resource in storage.
     *
     * 
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }
    // @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    // public function destroy($id)
    // {
    //     //
    // }
    // @param  int  $id
    // * @return \Illuminate\Http\Response
}
