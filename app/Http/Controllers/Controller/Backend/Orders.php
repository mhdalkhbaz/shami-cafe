<?php

namespace App\Http\Controllers\Controller\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Order;
use App\Model\Backend\Req;
use App\Model\Backend\Material;
use App\user;


class Orders extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
            //    die('sada');
           
            if( auth()->user()->id == 1 ){
                // $orders= Order::join('users','orders.support_id', '=', 'users.id')->select('orders.id','orders.branch_address','orders.create_at')
                $orders = Order::select('orders.id','user_Name','branch_address','create_at')
                ->where('complate','0')
                 ->orderBy('orders.create_at','desc')
                 ->get();
        
                }
                else
            if( auth()->user()->id == 19 ){
                // $orders= Order::join('users','orders.support_id', '=', 'users.id')->select('orders.id','orders.branch_address','orders.create_at')
                $orders = Order::select('orders.id','user_Name','branch_address','create_at')
                ->where('complate','0')
                ->Where('orders.support_id' , auth()->user()->supportId)
                 ->orderBy('orders.create_at','desc')
                 ->get();
        
                }
                else{
        
                    // $orders= Order::join('users','orders.branch_address', '=', 'users.name')->select('orders.id','orders.branch_address','orders.create_at')
                   $orders = Order::select('orders.id','user_Name','branch_address','create_at')
                    ->where('complate','0')
                    ->where('orders.branch_address' , auth()->user()->name)
                     ->orderBy('orders.create_at','desc')
                     ->get();
                //  dd($orders);
                    
                }


         $orders_accept= Order::select()
         ->where('complate','1')
         ->orderBy('create_at','desc')
         ->get();
         
        $orders_com= Order::select()
         ->where('complate','2')
         ->limit('10')
         ->orderBy('create_at', 'desc')
         ->get();
        // return $orders;
        
         return view('Backend.Pages.req.orders',compact('orders','orders_com','orders_accept'));
        
    }

    public function index_acc(){
            //    die('sada');
          $orders= Order::select()
         ->where('complate','0')
         ->orderBy('create_at','desc')
         ->get();

         $orders_accept= Order::select()
         ->where('complate','1')
         ->orderBy('create_at','desc')
         ->get();
         
        $orders_com= Order::select()
         ->where('complate','2')
       
         ->orderBy('create_at', 'desc')
         ->get();
        // return $orders;
        
         return view('Backend.Pages.req.orders_acc',compact('orders','orders_com','orders_accept'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly create_at resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    
        $req_t1 = Material::join('reqs','materials.id', '=', 'reqs.material_id')
        ->where('order_id',$id)
        ->where('type','1')
        ->get();

        $req_t2 = Material::join('reqs','materials.id', '=', 'reqs.material_id')
        ->where('order_id',$id)
        ->where('type','2')
        ->get();

        $req_t3 = Material::join('reqs','materials.id', '=', 'reqs.material_id')
        ->where('order_id',$id)
        ->where('type','3')
        ->get();


        $order = Order::select()
        ->where('id',$id)
        ->get();
        return view('Backend.Pages.req.order_details',compact('req_t1','req_t2','req_t3','order'));

          
 
    }
    public function show_acc($id)
    {    
        $req_t1 = Material::join('reqs','materials.id', '=', 'reqs.material_id')
        ->where('order_id',$id)
        ->where('type','1')
        ->get();

        $req_t2 = Material::join('reqs','materials.id', '=', 'reqs.material_id')
        ->where('order_id',$id)
        ->where('type','2')
        ->get();

        $req_t3 = Material::join('reqs','materials.id', '=', 'reqs.material_id')
        ->where('order_id',$id)
        ->where('type','3')
        ->get();

    

        $order = Order::select()
        ->where('id',$id)
        ->get();
        return view('Backend.Pages.req.order_details_acc',compact('req_t1','req_t2','req_t3','order'));

          
 
    }
    
    public function show_com($id)
    {    
        $req_t1 = Material::join('reqs','materials.id', '=', 'reqs.material_id')
        ->where('order_id',$id)
        ->where('type','1')
        ->get();

        $req_t2 = Material::join('reqs','materials.id', '=', 'reqs.material_id')
        ->where('order_id',$id)
        ->where('type','2')
        ->get();

        $req_t3 = Material::join('reqs','materials.id', '=', 'reqs.material_id')
        ->where('order_id',$id)
        ->where('type','3')
        ->get();


        $order = Order::select()
        ->where('id',$id)
        ->get();
        return view('Backend.Pages.req.order_details_com',compact('req_t1','req_t2','req_t3','order'));

          
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function update(Request $request, $id)
    {
        $order = Order::select()
        ->where('id',$id)
        ->update(['complate' => 1]);


        
        
        return redirect('/order')->with('success','تم الامر بنجاح   ');  

        

    }

    public function update_acc(Request $request, $id)
    {
        $order = Order::select()
        ->where('id',$id)
        ->update(['complate' => 2,'alameen_order_id'=>$request->alameen_order_id])
       
        ;
        
        return redirect('/order')->with('success','تم الامر بنجاح   ');  

        

    }




    public function order_update(Request $request , $id , $branch_address)
    {
        $order = Order::select()
        ->where('id',$id)
        ->where('branch_address',$branch_address)
        ->get()
        ;

        
           $material =  Material::select()
           ->where('type','1')
           ->get()
           ;
           
  
  
           $materialT2 =  Material::select()
           ->where('type','2')
           ->get( )
           ;
  
            $materialT3 =  Material::select()
            ->where('type','3')
            ->get( )
            ;
            
            
            $req_t1 = Req::select()

            ->where('order_id',$id)
            ->get( )
            ;  

        
        
        return view('Backend.Pages.req.form_update',compact('order','material','materialT2','materialT3','req_t1'));  
    }


    public function store(Request $request  )
    {

       
                $data=Req::
                where('order_id',$request->order_id)
            ->delete()
            ;

            if(count($request->qty1) > 0 )
            {
                  $sum=0;
            foreach($request->qty1 as $item=>$v){
    
               if( $request->qty1[$item] != 0 ||  $request->qty2[$item] != 0  ){
                   $sum=$request->qty1[$item] + $request->qty2[$item];
            }
             } 
            }
            
            
                $data=$request->all();
                if(count($request->qty1) > 0 )
                {
                     
              
                foreach($request->qty1 as $item=>$v){
                   if( $request->qty1[$item] != 0 ||  $request->qty2[$item] != 0  ){
                       $sum= $request->qty1[$item] + $request->qty2[$item];
    
                         $data2=array(
                        'order_id'=>$request->order_id,
                        'material_id'=>$request->material_id[$item],
                        'qty1'=>$request->qty1[$item],
                        'qty2'=>$request->qty2[$item],
                        'qty2'=>$request->qty2[$item],
                    );
    
                    Req::insert($data2);
    
                }
              } 
           }
            
           $order = Order::select()
          ->where('id',$request->order_id)
          ->update(['complate' => 1]);
           
           return redirect('/order')->with('success','تم الامر بنجاح   ');  
           
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
